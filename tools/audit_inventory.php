<?php
/**
 * Alumni Connect — Comprehensive Interactive Inventory & Link Auditor
 * Crawls application over HTTP for all 4 roles and static view files.
 */

require_once __DIR__ . '/../app/Core/Env.php';
require_once __DIR__ . '/../app/Core/Database.php';

App\Core\Env::load(__DIR__ . '/../.env');
$pdo = App\Core\Database::getConnection();

$baseUrl = 'http://127.0.0.1:8000';

function httpReq($url, $method = 'GET', $postData = [], $cookies = []) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    
    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    }
    
    if (!empty($cookies)) {
        $cookieParts = [];
        foreach ($cookies as $k => $v) {
            $cookieParts[] = "$k=$v";
        }
        curl_setopt($ch, CURLOPT_COOKIE, implode('; ', $cookieParts));
    }
    
    $raw = curl_exec($ch);
    if ($raw === false) {
        usleep(200000); // 200ms
        $raw = curl_exec($ch);
    }
    $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $header = substr($raw, 0, $headerSize);
    $body = substr($raw, $headerSize);
    
    $newCookies = [];
    if (preg_match_all('/^Set-Cookie:\s*([^;]+)/mi', $header, $matches)) {
        foreach ($matches[1] as $cStr) {
            parse_str($cStr, $parsed);
            foreach ($parsed as $k => $v) {
                $newCookies[$k] = $v;
            }
        }
    }
    
    $location = null;
    if (preg_match('/^Location:\s*(.+)$/mi', $header, $locMatches)) {
        $location = trim($locMatches[1]);
    }
    
    curl_close($ch);
    return [
        'code' => $httpCode,
        'header' => $header,
        'body' => $body,
        'cookies' => array_merge($cookies, $newCookies),
        'location' => $location
    ];
}

function loginRole($baseUrl, $email, $password) {
    // 1. Get login page to grab CSRF
    $res = httpReq("$baseUrl/login");
    $csrf = $res['cookies']['csrf_token'] ?? '';
    
    // 2. Submit login
    $loginRes = httpReq("$baseUrl/login", 'POST', [
        'email' => $email,
        'password' => $password,
        'csrf_token' => $csrf
    ], $res['cookies']);
    
    return [
        'cookies' => $loginRes['cookies'],
        'csrf' => $csrf,
        'body' => $loginRes['body']
    ];
}

echo "=== STARTING COMPREHENSIVE AUDIT ===\n";

// Parse routes/web.php to get all defined routes
$webRoutesContent = file_get_contents(__DIR__ . '/../routes/web.php');
$definedRoutes = [];
if (preg_match_all("/Router::(get|post)\(\s*['\"]([^'\"]+)['\"]/i", $webRoutesContent, $rMatches)) {
    for ($i = 0; $i < count($rMatches[0]); $i++) {
        $method = strtoupper($rMatches[1][$i]);
        $route = $rMatches[2][$i];
        $definedRoutes[$method][] = $route;
    }
}

$rolesToAudit = [
    'student' => [
        'email' => 'student@alumni.test',
        'pages' => [
            '/dashboard', '/profile', '/directory', '/mentorship', '/referral-request',
            '/jobs', '/events', '/community', '/messages', '/marketplace',
            '/donations', '/business-directory', '/startup-hub', '/career-center',
            '/notifications', '/rewards', '/ads', '/settings', '/search'
        ]
    ],
    'alumni' => [
        'email' => 'alumni@alumni.test',
        'pages' => [
            '/dashboard', '/profile', '/directory', '/mentorship', '/referral-request',
            '/jobs', '/events', '/community', '/messages', '/marketplace',
            '/donations', '/business-directory', '/startup-hub', '/career-center',
            '/notifications', '/rewards', '/ads', '/settings'
        ]
    ],
    'college_admin' => [
        'email' => 'admin@alumni.test',
        'pages' => [
            '/admin/dashboard', '/admin/moderation', '/admin/payments',
            '/admin/analytics', '/events-admin'
        ]
    ],
    'super_admin' => [
        'email' => 'superadmin@alumni.test',
        'pages' => [
            '/super-admin/dashboard', '/super-admin/analytics',
            '/super-admin/institutions', '/super-admin/revenue',
            '/super-admin/settings'
        ]
    ]
];

$inventory = [];
$allEncounteredHrefs = [];
$allEncounteredFormActions = [];

foreach ($rolesToAudit as $role => $info) {
    echo "Auditing role: $role ($info[email])...\n";
    $auth = loginRole($baseUrl, $info['email'], 'Password123!');
    $cookies = $auth['cookies'];
    
    foreach ($info['pages'] as $page) {
        $res = httpReq("$baseUrl$page", 'GET', [], $cookies);
        $html = $res['body'];
        
        if ($res['code'] !== 200) {
            $inventory[] = [
                'role' => $role,
                'page' => $page,
                'element' => 'Page Load',
                'expected' => 'HTTP 200 Page Content',
                'status' => "HTTP {$res['code']}",
                'defect' => true
            ];
            continue;
        }
        
        $dom = new DOMDocument();
        @$dom->loadHTML($html);
        $xpath = new DOMXPath($dom);
        
        // 1. Audit Links
        $links = $xpath->query('//a');
        foreach ($links as $link) {
            $href = trim($link->getAttribute('href'));
            $text = trim(preg_replace('/\s+/', ' ', $link->textContent));
            if (empty($text)) $text = '[Icon/Image Link]';
            if (strlen($text) > 40) $text = substr($text, 0, 37) . '...';
            
            $isPlaceholder = in_array($href, ['#', '', 'javascript:void(0)', 'javascript:;']);
            $allEncounteredHrefs[$href] = true;
            
            if ($isPlaceholder) {
                $inventory[] = [
                    'role' => $role,
                    'page' => $page,
                    'element' => "Link: $text",
                    'expected' => "Valid destination route (href=\"$href\")",
                    'status' => 'Placeholder / Dead link',
                    'defect' => true
                ];
            } else {
                // Test target link if relative
                if (strpos($href, 'http') !== 0 && strpos($href, 'mailto:') !== 0 && strpos($href, 'tel:') !== 0) {
                    $targetUrl = "$baseUrl" . (strpos($href, '/') === 0 ? '' : '/') . $href;
                    $linkCheck = httpReq($targetUrl, 'GET', [], $cookies);
                    $targetCode = $linkCheck['code'];
                    $isDefect = ($targetCode === 404 || $targetCode === 500);
                    $inventory[] = [
                        'role' => $role,
                        'page' => $page,
                        'element' => "Link: $text (href=\"$href\")",
                        'expected' => "Reachable page (HTTP 200 or 302)",
                        'status' => "HTTP $targetCode" . ($linkCheck['location'] ? " -> {$linkCheck['location']}" : ""),
                        'defect' => $isDefect
                    ];
                }
            }
        }
        
        // 2. Audit Forms
        $forms = $xpath->query('//form');
        foreach ($forms as $form) {
            $action = trim($form->getAttribute('action'));
            $method = strtoupper(trim($form->getAttribute('method')) ?: 'GET');
            $id = $form->getAttribute('id') ?: '[unnamed]';
            
            $hasCsrf = false;
            $inputs = $xpath->query('.//input[@name="csrf_token"]', $form);
            if ($inputs->length > 0) $hasCsrf = true;
            
            $allEncounteredFormActions[$action] = true;
            $actionClean = strtok($action, '?');
            $routeExists = false;
            
            if (!empty($definedRoutes[$method])) {
                foreach ($definedRoutes[$method] as $dr) {
                    $pat = preg_replace('/\{[a-zA-Z0-9_]+\}/', '[^/]+', $dr);
                    if (preg_match("@^$pat$@", $actionClean)) {
                        $routeExists = true;
                        break;
                    }
                }
            }
            
            $defect = false;
            $statusParts = [];
            if ($method === 'POST' && !$hasCsrf) {
                $defect = true;
                $statusParts[] = 'Missing CSRF input';
            }
            if (!$routeExists && !empty($action)) {
                $defect = true;
                $statusParts[] = 'Action route not in web.php';
            }
            if (empty($statusParts)) {
                $statusParts[] = "Valid ($method, CSRF " . ($hasCsrf ? 'present' : 'N/A') . ")";
            }
            
            $inventory[] = [
                'role' => $role,
                'page' => $page,
                'element' => "Form: $id (action=\"$action\" method=\"$method\")",
                'expected' => "Active route in web.php with CSRF token",
                'status' => implode(', ', $statusParts),
                'defect' => $defect
            ];
        }
        
        // 3. Audit Buttons
        $buttons = $xpath->query('//button');
        foreach ($buttons as $btn) {
            $text = trim(preg_replace('/\s+/', ' ', $btn->textContent));
            if (empty($text)) $text = '[Icon Button]';
            if (strlen($text) > 35) $text = substr($text, 0, 32) . '...';
            
            $onclick = $btn->getAttribute('onclick');
            $type = strtolower($btn->getAttribute('type') ?: 'submit');
            $insideForm = ($xpath->query('ancestor::form', $btn)->length > 0) || $btn->hasAttribute('form');
            
            $hasAction = !empty($onclick) || ($insideForm && $type === 'submit');
            
            if (!$hasAction && empty($btn->getAttribute('data-bs-toggle')) && empty($btn->getAttribute('data-action'))) {
                $inventory[] = [
                    'role' => $role,
                    'page' => $page,
                    'element' => "Button: $text (type=\"$type\")",
                    'expected' => "Functional click handler or form submission",
                    'status' => "No action handler / inert button",
                    'defect' => true
                ];
            }
        }
        
        // 4. Audit Inline Scripts for fetch/ajax
        if (preg_match_all("/fetch\(\s*['\"]([^'\"]+)['\"]/i", $html, $fetchMatches)) {
            foreach ($fetchMatches[1] as $fUrl) {
                $fClean = strtok($fUrl, '?');
                $routeFound = false;
                foreach (['GET', 'POST'] as $m) {
                    if (!empty($definedRoutes[$m])) {
                        foreach ($definedRoutes[$m] as $dr) {
                            $pat = preg_replace('/\{[a-zA-Z0-9_]+\}/', '[^/]+', $dr);
                            if (preg_match("@^$pat$@", $fClean)) {
                                $routeFound = true;
                                break 2;
                            }
                        }
                    }
                }
                if (!$routeFound) {
                    $inventory[] = [
                        'role' => $role,
                        'page' => $page,
                        'element' => "Script fetch: $fUrl",
                        'expected' => "Endpoint registered in routes/web.php",
                        'status' => "Endpoint missing in router",
                        'defect' => true
                    ];
                }
            }
        }
    }
}

// 5. Cross-Check routes/web.php
$unlinkedRoutes = [];
foreach (['GET', 'POST'] as $m) {
    if (!empty($definedRoutes[$m])) {
        foreach ($definedRoutes[$m] as $r) {
            if ($r === '/' || $r === '/login' || $r === '/signup' || $r === '/logout' || strpos($r, '/dev/') === 0) continue;
            // Check if any href or form matches
            $matched = false;
            foreach (array_keys($allEncounteredHrefs) as $h) {
                if ($h === $r || strpos($h, $r . '?') === 0) { $matched = true; break; }
            }
            if (!$matched) {
                foreach (array_keys($allEncounteredFormActions) as $fa) {
                    if ($fa === $r || strpos($fa, $r . '?') === 0) { $matched = true; break; }
                }
            }
            if (!$matched) {
                $unlinkedRoutes[] = "$m $r";
            }
        }
    }
}

// Scan views for hardcoded statistics and placeholders
$viewFiles = glob(__DIR__ . '/../resources/views/pages/*.php');
$viewFiles = array_merge($viewFiles, glob(__DIR__ . '/../resources/views/pages/*/*.php'));
$hardcodedGaps = [];

foreach ($viewFiles as $vf) {
    $content = file_get_contents($vf);
    $relName = str_replace(realpath(__DIR__ . '/../resources/views/pages/'), '', realpath($vf));
    
    // Look for suspicious hardcoded metrics
    if (preg_match_all('/(12,450|\$98,240|85%|3\.9\/4\.0|Marcus Vance|Elena Rostova)/i', $content, $hMatches)) {
        foreach (array_unique($hMatches[0]) as $match) {
            $hardcodedGaps[] = [
                'file' => $relName,
                'string' => $match
            ];
        }
    }
}

// Output Markdown Report
$md = "# Alumni Connect — Interactive Element & Route Audit Inventory\n\n";
$md .= "**Generated:** " . date('Y-m-d H:i:s') . "\n";
$md .= "**Runtime:** PHP " . PHP_VERSION . "\n\n";

$defects = array_filter($inventory, function($item) { return $item['defect']; });
$working = array_filter($inventory, function($item) { return !$item['defect']; });

$md .= "## Summary Metrics\n\n";
$md .= "- **Total Elements Audited:** " . count($inventory) . "\n";
$md .= "- **Functional Elements (Passing):** " . count($working) . "\n";
$md .= "- **Defects / Gaps Detected:** " . count($defects) . "\n";
$md .= "- **Hardcoded View Strings:** " . count($hardcodedGaps) . "\n";
$md .= "- **Unlinked Defined Routes:** " . count($unlinkedRoutes) . "\n\n";

$md .= "## Defect Inventory (Pending Fixes)\n\n";
$md .= "| Role | Page | Element | Expected Behaviour | Current Status |\n";
$md .= "|---|---|---|---|---|\n";

foreach ($defects as $d) {
    $role = htmlspecialchars($d['role']);
    $page = htmlspecialchars($d['page']);
    $el = htmlspecialchars($d['element']);
    $exp = htmlspecialchars($d['expected']);
    $st = htmlspecialchars($d['status']);
    $md .= "| $role | $page | $el | $exp | **$st** |\n";
}

$md .= "\n## Hardcoded View Strings Detected\n\n";
$md .= "| View File | Hardcoded Placeholder |\n";
$md .= "|---|---|\n";
foreach ($hardcodedGaps as $hg) {
    $md .= "| " . htmlspecialchars($hg['file']) . " | `" . htmlspecialchars($hg['string']) . "` |\n";
}

$md .= "\n## Unlinked Routes in `routes/web.php`\n\n";
foreach ($unlinkedRoutes as $ur) {
    $md .= "- `" . htmlspecialchars($ur) . "`\n";
}

$md .= "\n## Full Audit Roster (All Elements)\n\n";
$md .= "| Role | Page | Element | Expected Behaviour | Current Status |\n";
$md .= "|---|---|---|---|---|\n";
foreach ($inventory as $item) {
    $statusText = $item['defect'] ? "**" . htmlspecialchars($item['status']) . "**" : "PASS (" . htmlspecialchars($item['status']) . ")";
    $md .= "| {$item['role']} | {$item['page']} | " . htmlspecialchars($item['element']) . " | " . htmlspecialchars($item['expected']) . " | $statusText |\n";
}

file_put_contents(__DIR__ . '/../docs/INVENTORY.md', $md);
echo "Audit complete! Output saved to docs/INVENTORY.md\n";
echo "Total Audited: " . count($inventory) . " | Defects: " . count($defects) . "\n";
