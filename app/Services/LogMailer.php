<?php
namespace App\Services;

class LogMailer {
    public static function send($to, $subject, $body) {
        $logFile = __DIR__ . '/../../storage/logs/mail.log';
        $dir = dirname($logFile);
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }

        $entry = sprintf(
            "[%s] To: %s\nSubject: %s\nBody: %s\n---------------------------\n",
            date('Y-m-d H:i:s'),
            $to,
            $subject,
            $body
        );

        file_put_contents($logFile, $entry, FILE_APPEND);
    }
}
