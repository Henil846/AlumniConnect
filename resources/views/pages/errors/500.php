<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 — Internal Server Error | Alumni Connect</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --color-primary: #1a2340;
            --color-accent: #F5A623;
            --color-bg: #F5F4F0;
            --color-white: #ffffff;
            --color-text: #1a2340;
            --color-text-muted: #6b7280;
            --color-border: #e5e7eb;
            --radius-lg: 20px;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--color-bg);
            color: var(--color-text);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }
        .error-card {
            background: var(--color-white);
            border: 1px solid var(--color-border);
            border-radius: var(--radius-lg);
            padding: 48px 36px;
            max-width: 520px;
            width: 100%;
            text-align: center;
            box-shadow: 0 16px 48px rgba(0,0,0,0.08);
        }
        .icon-circle {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background: #fef2f2;
            color: #dc2626;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 24px;
        }
        h1 {
            font-size: 1.85rem;
            font-weight: 800;
            color: var(--color-primary);
            margin-bottom: 12px;
            letter-spacing: -0.02em;
        }
        p {
            font-size: 0.95rem;
            color: var(--color-text-muted);
            line-height: 1.6;
            margin-bottom: 32px;
        }
        .btn-row {
            display: flex;
            gap: 12px;
            justify-content: center;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            border-radius: 9999px;
            font-size: 0.9rem;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        .btn-primary {
            background: var(--color-primary);
            color: #fff;
        }
        .btn-primary:hover {
            background: #243060;
        }
        .btn-outline {
            background: transparent;
            color: var(--color-primary);
            border: 1px solid var(--color-border);
        }
        .btn-outline:hover {
            background: #f3f4f6;
        }
    </style>
</head>
<body>
    <div class="error-card">
        <div class="icon-circle">
            <svg viewBox="0 0 24 24" width="36" height="36" fill="none" stroke="currentColor" stroke-width="2.2">
                <circle cx="12" cy="12" r="10"/>
                <line x1="12" y1="8" x2="12" y2="12"/>
                <line x1="12" y1="16" x2="12.01" y2="16"/>
            </svg>
        </div>
        <h1>500 — Server Error</h1>
        <p>Something went wrong on our servers while processing your request. Our team has been notified. Please try again in a few moments.</p>
        <div class="btn-row">
            <a href="/dashboard" class="btn btn-primary">Return to Dashboard</a>
            <a href="/" class="btn btn-outline">Go to Homepage</a>
        </div>
    </div>
</body>
</html>
