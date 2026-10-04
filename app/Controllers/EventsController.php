<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\Database;

class EventsController {
    public function index() {
        $pdo = Database::getConnection();
        $collegeId = \App\Core\Auth::user()->college_id ?? null;
        $sql = "SELECT * FROM events WHERE college_id = ?";
        $params = [$collegeId];

        if (!empty($_GET['type']) && is_array($_GET['type'])) {
            $placeholders = str_repeat('?,', count($_GET['type']) - 1) . '?';
            $sql .= " AND type IN ($placeholders)";
            $params = array_merge($params, $_GET['type']);
        }

        if (!empty($_GET['search'])) {
            $sql .= " AND title LIKE ?";
            $params[] = '%' . $_GET['search'] . '%';
        }

        $sql .= " ORDER BY date ASC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        $events = $stmt->fetchAll(\PDO::FETCH_OBJ);
        
        $userId = \App\Core\Auth::id() ?? null;
        
        // Fetch user's registered events
        $registeredEventIds = [];
        if ($userId) {
            $stmt = $pdo->prepare("SELECT event_id FROM event_registrations WHERE user_id = ?");
            $stmt->execute([$userId]);
            $registeredEventIds = $stmt->fetchAll(\PDO::FETCH_COLUMN);
        }

        // Handle selected event details
        $selectedEventId = $_GET['event_id'] ?? ($events[0]->id ?? null);
        $selectedEvent = null;
        if ($selectedEventId) {
            $stmt = $pdo->prepare("SELECT * FROM events WHERE id = ? AND college_id = ?");
            $stmt->execute([$selectedEventId, $collegeId]);
            $selectedEvent = $stmt->fetch(\PDO::FETCH_OBJ);
        }

        return View::render('events', [
            'title' => 'Events & Webinars — Alumni Connect',
            'activePage' => 'events',
            'events' => $events,
            'selectedEvent' => $selectedEvent,
            'registeredEventIds' => $registeredEventIds,
            'extraCss' => '/assets/css/extended.css'
        ], 'app');
    }

    public function register() {
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            die("CSRF Token Verification Failed");
        }
        
        $eventId = $_POST['event_id'];
        $userId = \App\Core\Auth::id() ?? null;
        if (!$userId) die("Unauthorized");

        $pdo = Database::getConnection();
        
        $collegeId = \App\Core\Auth::user()->college_id ?? null;
        
        // Check capacity and tenant
        $stmt = $pdo->prepare("SELECT capacity FROM events WHERE id = ? AND college_id = ?");
        $stmt->execute([$eventId, $collegeId]);
        $capacity = $stmt->fetchColumn();
        
        if ($capacity === false) die("Event not found or unauthorized");

        $stmt = $pdo->prepare("SELECT COUNT(*) FROM event_registrations WHERE event_id = ? AND status IN ('registered', 'attended')");
        $stmt->execute([$eventId]);
        $currentCount = $stmt->fetchColumn();

        $status = 'registered';
        if ($capacity !== false && $capacity !== null && $currentCount >= $capacity) {
            $status = 'waitlisted';
        }

        // Generate a simple unique string for QR code mock
        $qrCode = md5($eventId . '-' . $userId . '-' . time());

        $stmt = $pdo->prepare("INSERT INTO event_registrations (event_id, user_id, status, qr_code, college_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$eventId, $userId, $status, $qrCode, $collegeId]);
        
        // Generate Notification for Attendee
        $eventTitle = $pdo->query("SELECT title FROM events WHERE id = " . intval($eventId))->fetchColumn() ?: 'an event';
        $notifStmt = $pdo->prepare("INSERT INTO notifications (user_id, type, message, college_id) VALUES (?, 'event_reminder', ?, ?)");
        $notifStmt->execute([$userId, "You have successfully registered for '$eventTitle'.", $collegeId]);

        header("Location: /events?registered=1&event_id=$eventId");
        exit;
    }
}
