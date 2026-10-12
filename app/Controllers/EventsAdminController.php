<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\Database;
use Dompdf\Dompdf;

class EventsAdminController {
    private function checkAdmin() {
        $role = \App\Core\Auth::user()->role ?? null;
        if ($role !== 'admin' && $role !== 'college_admin' && $role !== 'super_admin') {
            http_response_code(403);
            try {
                \App\Core\View::render('errors/403', ['title' => 'Access Forbidden — Alumni Connect', 'activePage' => ''], 'app');
            } catch (\Throwable $t) {
                echo "Unauthorized: Events Admin access required.";
            }
            exit;
        }
    }

    public function index() {
        $this->checkAdmin();
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
        $this->checkAdmin();
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

        $isTesting = (\App\Core\Env::get('APP_ENV', 'production') === 'testing');
        $engine = $isTesting ? ($_GET['engine'] ?? null) : null;
        $useFallback = ($engine === 'fallback' || !class_exists(Dompdf::class));

        if (!$useFallback && class_exists(Dompdf::class)) {
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            $dompdf->stream("certificate_{$data->full_name}.pdf", array("Attachment" => false));
            exit;
        }

        // Pure-PHP zero-dependency structurally valid PDF-1.4 stream fallback
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="certificate_' . rawurlencode($data->full_name) . '.pdf"');
        $cleanName = addcslashes($data->full_name, '()\\');
        $cleanTitle = addcslashes($data->event_title, '()\\');
        $cleanDate = date('F j, Y', strtotime($data->event_date));

        // Decorative borders and clear text layout
        $stream = "0.2 0.4 0.8 rg\n"
                . "2 w\n"
                . "20 20 752 572 re S\n"
                . "0.8 0.6 0.2 rg\n"
                . "1 w\n"
                . "25 25 742 562 re S\n"
                . "0 0 0 rg\n"
                . "BT\n"
                . "/F1 28 Tf\n"
                . "50 500 Td\n"
                . "(Certificate of Attendance) Tj\n"
                . "ET\n"
                . "BT\n"
                . "/F1 16 Tf\n"
                . "50 440 Td\n"
                . "(This certifies that) Tj\n"
                . "ET\n"
                . "BT\n"
                . "/F1 24 Tf\n"
                . "50 390 Td\n"
                . "(" . $cleanName . ") Tj\n"
                . "ET\n"
                . "BT\n"
                . "/F1 16 Tf\n"
                . "50 340 Td\n"
                . "(has successfully attended the collegiate event:) Tj\n"
                . "ET\n"
                . "BT\n"
                . "/F1 20 Tf\n"
                . "50 290 Td\n"
                . "(" . $cleanTitle . ") Tj\n"
                . "ET\n"
                . "BT\n"
                . "/F1 14 Tf\n"
                . "50 230 Td\n"
                . "(Date: " . $cleanDate . ") Tj\n"
                . "ET\n";

        $objects = [
            1 => "<< /Type /Catalog /Pages 2 0 R >>",
            2 => "<< /Type /Pages /Kids [4 0 R] /Count 1 >>",
            3 => "<< /Type /Font /Subtype /Type1 /BaseFont /Helvetica /Encoding /WinAnsiEncoding >>",
            4 => "<< /Type /Page /Parent 2 0 R /MediaBox [0 0 792 612] /Resources << /Font << /F1 3 0 R >> /ProcSet [/PDF /Text] >> /Contents 5 0 R >>",
            5 => "<< /Length " . strlen($stream) . " >>\nstream\n" . $stream . "endstream"
        ];

        $header = "%PDF-1.4\n%\xe2\xe3\xcf\xd3\n";
        $body = '';
        $xrefOffsets = [0 => 0];

        foreach ($objects as $num => $obj) {
            $xrefOffsets[$num] = strlen($header) + strlen($body);
            $body .= "{$num} 0 obj\n{$obj}\nendobj\n";
        }

        $startXref = strlen($header) + strlen($body);
        $xref = "xref\n0 " . (count($objects) + 1) . "\n";
        $xref .= "0000000000 65535 f \n";
        for ($i = 1; $i <= count($objects); $i++) {
            $xref .= sprintf("%010d 00000 n \n", $xrefOffsets[$i]);
        }

        $trailer = "trailer\n<< /Size " . (count($objects) + 1) . " /Root 1 0 R >>\nstartxref\n{$startXref}\n%%EOF\n";
        echo $header . $body . $xref . $trailer;
        exit;
    }

    public function uploadGallery() {
        $this->checkAdmin();
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            http_response_code(403);
            die("CSRF validation failed.");
        }
        $eventId = (int)($_POST['event_id'] ?? 0);
        $collegeId = \App\Core\Auth::user()->college_id ?? null;
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM events WHERE id = ?");
        $stmt->execute([$eventId]);
        $event = $stmt->fetch(\PDO::FETCH_OBJ);
        if (!$event || ($event->college_id != $collegeId && \App\Core\Auth::user()->role !== 'super_admin')) {
            http_response_code(403);
            die("Unauthorized: Event outside college");
        }
        
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

        $ext = strtolower(pathinfo($_FILES['gallery_image']['name'], PATHINFO_EXTENSION));
        $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($ext, $allowedExts)) {
            header("Location: /events-admin?error=Invalid+File+Extension&event_id=$eventId");
            exit;
        }

        if ($_FILES['gallery_image']['size'] > 5 * 1024 * 1024) { // 5MB limit
            header("Location: /events-admin?error=File+Too+Large&event_id=$eventId");
            exit;
        }

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

    public function create() {
        $this->checkAdmin();
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            die("CSRF Token Verification Failed");
        }
        $title = trim($_POST['title'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $date = trim($_POST['date'] ?? date('Y-m-d H:i:s'));
        $location = trim($_POST['location'] ?? 'Campus Grounds');
        $type = trim($_POST['type'] ?? 'Networking');
        $collegeId = \App\Core\Auth::user()->college_id ?? null;

        if ($title) {
            $pdo = Database::getConnection();
            $stmt = $pdo->prepare("INSERT INTO events (title, description, date, location, type, college_id, image_url) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$title, $description, $date, $location, $type, $collegeId, '/assets/img/campus_cover.png']);
        }
        header("Location: /events-admin?created=1");
        exit;
    }

    public function edit() {
        $this->checkAdmin();
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            die("CSRF Token Verification Failed");
        }
        $eventId = (int)($_POST['event_id'] ?? 0);
        $title = trim($_POST['title'] ?? '');
        $collegeId = \App\Core\Auth::user()->college_id ?? null;

        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM events WHERE id = ?");
        $stmt->execute([$eventId]);
        $event = $stmt->fetch(\PDO::FETCH_OBJ);
        if (!$event || ($event->college_id != $collegeId && \App\Core\Auth::user()->role !== 'super_admin')) {
            http_response_code(403);
            die("Unauthorized: Event outside college");
        }
        $pdo->prepare("UPDATE events SET title = ? WHERE id = ?")->execute([$title, $eventId]);
        header("Location: /events-admin?updated=1&event_id=$eventId");
        exit;
    }

    public function delete() {
        $this->checkAdmin();
        if (!isset($_POST['csrf_token']) || !isset($_COOKIE['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
            die("CSRF Token Verification Failed");
        }
        $eventId = (int)($_POST['event_id'] ?? 0);
        $collegeId = \App\Core\Auth::user()->college_id ?? null;

        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM events WHERE id = ?");
        $stmt->execute([$eventId]);
        $event = $stmt->fetch(\PDO::FETCH_OBJ);
        if (!$event || ($event->college_id != $collegeId && \App\Core\Auth::user()->role !== 'super_admin')) {
            http_response_code(403);
            die("Unauthorized: Event outside college");
        }
        $pdo->prepare("DELETE FROM events WHERE id = ?")->execute([$eventId]);
        header("Location: /events-admin?deleted=1");
        exit;
    }
}
