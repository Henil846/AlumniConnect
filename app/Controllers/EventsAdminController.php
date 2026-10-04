<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\Database;
use Dompdf\Dompdf;

class EventsAdminController {
    public function index() {
        $pdo = Database::getConnection();
        
        $sql = "SELECT * FROM events ORDER BY date ASC";
        $events = $pdo->query($sql)->fetchAll(\PDO::FETCH_OBJ);
        
        $selectedEventId = $_GET['event_id'] ?? ($events[0]->id ?? null);
        $selectedEvent = null;
        $registrations = [];
        $gallery = [];
        
        if ($selectedEventId) {
            $stmt = $pdo->prepare("SELECT * FROM events WHERE id = ?");
            $stmt->execute([$selectedEventId]);
            $selectedEvent = $stmt->fetch(\PDO::FETCH_OBJ);

            $stmt = $pdo->prepare("
                SELECT er.*, u.full_name, u.email 
                FROM event_registrations er 
                JOIN users u ON er.user_id = u.id 
                WHERE er.event_id = ?
            ");
            $stmt->execute([$selectedEventId]);
            $registrations = $stmt->fetchAll(\PDO::FETCH_OBJ);

            $stmt = $pdo->prepare("SELECT * FROM event_gallery WHERE event_id = ?");
            $stmt->execute([$selectedEventId]);
            $gallery = $stmt->fetchAll(\PDO::FETCH_OBJ);
        }

        return View::render('events-admin', [
            'title' => 'Events Admin — Alumni Connect',
            'activePage' => 'events-admin',
            'events' => $events,
            'selectedEvent' => $selectedEvent,
            'registrations' => $registrations,
            'gallery' => $gallery,
            
        ], 'app');
    }

    public function checkin() {
        $qr = trim($_POST['qr_code'] ?? '');
        if (!$qr) {
            header("Location: /events-admin?error=Empty+QR+Code");
            exit;
        }

        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM event_registrations WHERE qr_code = ?");
        $stmt->execute([$qr]);
        $reg = $stmt->fetch(\PDO::FETCH_OBJ);

        if (!$reg) {
            header("Location: /events-admin?error=Invalid+QR+Code");
            exit;
        }

        if ($reg->status === 'attended') {
            header("Location: /events-admin?error=Already+Checked+In");
            exit;
        }

        $stmt = $pdo->prepare("UPDATE event_registrations SET status = 'attended' WHERE id = ?");
        $stmt->execute([$reg->id]);

        header("Location: /events-admin?success=Checked+In&event_id={$reg->event_id}");
        exit;
    }

    public function generateCertificate() {
        $regId = $_GET['reg_id'] ?? null;
        if (!$regId) die("Missing Registration ID");

        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("
            SELECT er.*, e.title as event_title, e.date as event_date, u.full_name 
            FROM event_registrations er 
            JOIN events e ON er.event_id = e.id 
            JOIN users u ON er.user_id = u.id 
            WHERE er.id = ?
        ");
        $stmt->execute([$regId]);
        $data = $stmt->fetch(\PDO::FETCH_OBJ);

        if (!$data || $data->status !== 'attended') {
            die("Not eligible for certificate. Must be marked as attended.");
        }

        $html = "
            <div style='text-align:center; padding: 50px; font-family: sans-serif; border: 10px solid #f3f4f6;'>
                <h1 style='color: #0b1329; font-size:48px;'>Certificate of Attendance</h1>
                <p style='font-size:24px;'>This is to certify that</p>
                <h2 style='color: #059669; font-size:36px; text-decoration: underline;'>{$data->full_name}</h2>
                <p style='font-size:24px;'>has successfully attended the event</p>
                <h3 style='font-size:30px;'>{$data->event_title}</h3>
                <p>on " . date('F j, Y', strtotime($data->event_date)) . "</p>
                <br><br><br>
                <div style='display:inline-block; border-top:1px solid #000; padding-top:10px; width:200px;'>
                    Alumni Association
                </div>
            </div>
        ";

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream("certificate_{$data->full_name}.pdf", array("Attachment" => false));
    }

    public function uploadGallery() {
        $eventId = $_POST['event_id'];
        
        if (!isset($_FILES['gallery_image']) || $_FILES['gallery_image']['error'] !== UPLOAD_ERR_OK) {
            header("Location: /events-admin?error=Upload+Failed&event_id=$eventId");
            exit;
        }

        $tmpName = $_FILES['gallery_image']['tmp_name'];
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($tmpName);

        $allowedMimes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($mime, $allowedMimes)) {
            header("Location: /events-admin?error=Invalid+File+Type&event_id=$eventId");
            exit;
        }

        if ($_FILES['gallery_image']['size'] > 5 * 1024 * 1024) { // 5MB limit
            header("Location: /events-admin?error=File+Too+Large&event_id=$eventId");
            exit;
        }

        $ext = pathinfo($_FILES['gallery_image']['name'], PATHINFO_EXTENSION);
        $filename = 'gallery_' . $eventId . '_' . time() . '.' . $ext;
        
        // Store outside web root if requested, but for serving via HTTP easily let's use a public folder
        // The original prompt said "stored outside web root" for security, so we should put it in storage/app/gallery and serve via a route
        $uploadDir = __DIR__ . '/../../storage/gallery';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $destPath = $uploadDir . '/' . $filename;
        if (move_uploaded_file($tmpName, $destPath)) {
            $pdo = Database::getConnection();
            $stmt = $pdo->prepare("INSERT INTO event_gallery (event_id, file_path) VALUES (?, ?)");
            $stmt->execute([$eventId, $filename]);
            header("Location: /events-admin?success=Image+Uploaded&event_id=$eventId");
        } else {
            header("Location: /events-admin?error=Move+Failed&event_id=$eventId");
        }
        exit;
    }

    // A helper method to serve the image securely since it's outside web root
    public function serveGalleryImage($filename) {
        $path = __DIR__ . '/../../storage/gallery/' . basename($filename);
        if (!file_exists($path)) {
            http_response_code(404);
            die("Not found");
        }
        
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        header('Content-Type: ' . $finfo->file($path));
        readfile($path);
    }
}
