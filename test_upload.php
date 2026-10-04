<?php
$target_url = 'http://localhost:8000/events-admin/upload-gallery';

// Create a fake PHP file masquerading as JPG
$fake_jpg = __DIR__ . '/fake.jpg';
file_put_contents($fake_jpg, '<?php echo "Hacked"; ?>');

$cfile = new CURLFile($fake_jpg, 'image/jpeg', 'fake.jpg');

// We need an auth cookie and csrf token to hit the endpoint. Let's get it.
require 'app/Core/Env.php';
require 'app/Core/Database.php';
App\Core\Env::load(__DIR__ . '/.env');

$base = "http://localhost:8000";
$ch = curl_init($base . '/login');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);
$res = curl_exec($ch);
preg_match('/^Set-Cookie:\s*csrf_token=([^;]*)/mi', $res, $m);
$csrf = $m[1] ?? '';

$ch2 = curl_init($base . '/login');
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch2, CURLOPT_HEADER, true);
curl_setopt($ch2, CURLOPT_POST, true);
curl_setopt($ch2, CURLOPT_POSTFIELDS, http_build_query(['email'=>'user1@test.com', 'password'=>'Password123!', 'csrf_token'=>$csrf]));
curl_setopt($ch2, CURLOPT_COOKIE, "csrf_token=$csrf");
$res2 = curl_exec($ch2);
preg_match('/^Set-Cookie:\s*auth_token=([^;]*)/mi', $res2, $m2);
$auth = $m2[1] ?? '';

// Now attempt the upload
$ch3 = curl_init($target_url);
curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch3, CURLOPT_HEADER, true);
curl_setopt($ch3, CURLOPT_POST, true);
$post = ['event_id' => 1, 'gallery_image' => $cfile, 'csrf_token' => $csrf];
curl_setopt($ch3, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch3, CURLOPT_COOKIE, "csrf_token=$csrf; auth_token=$auth");

$result = curl_exec($ch3);
echo $result;

unlink($fake_jpg);
