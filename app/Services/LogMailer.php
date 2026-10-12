<?php
namespace App\Services;

class LogMailer {
    public static function send($to, $subject, $body) {
        $appEnv = \App\Core\Env::get('APP_ENV', 'production');
        if (!in_array($appEnv, ['local', 'testing', 'development'])) {
            return;
        }

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
