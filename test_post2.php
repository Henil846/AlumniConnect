<?php
$ch = curl_init('http://localhost:8000/login');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
$data = ['email'=>'alumni@example.com', 'password'=>'password123', 'csrf_token'=>'test', 'role'=>'alumni'];
curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // Using array sends multipart/form-data
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/json', 'Cookie: csrf_token=test']);
$res = curl_exec($ch);
echo curl_getinfo($ch, CURLINFO_HTTP_CODE) . "\n" . $res;
