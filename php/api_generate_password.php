<?php
// api_generate_password.php
header('Content-Type: application/json');
// strong random password: 10 chars from base64-ish
$bytes = random_bytes(6);
$password = substr(bin2hex($bytes), 0, 10);
echo json_encode(['password' => $password]);
