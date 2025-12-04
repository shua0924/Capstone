<?php
// api_generate_voucher.php
header('Content-Type: application/json');

// Database config
$db   = 'wifi_hotspot';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

// Change this to your actual host — e.g. localhost
$host = 'localhost';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    // 1. Connect
    $pdo = new PDO($dsn, $user, $pass, $options);

    // 2. Generate voucher
    $voucher_code = 'CEC - WIFI HOTSPOT - ' . random_int(100, 999) . substr(md5(uniqid(mt_rand(), true)), 0, 4);

    // 3. Optionally get user_id from request
    $user_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : null;

    // 4. Insert into DB — adjust fields depending on your table definition
    if ($user_id) {
        $sql = "INSERT INTO vouchers (user_profile_id, code, created_at) VALUES (?, ?, NOW())";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id, $voucher_code]);
    } else {
        $sql = "INSERT INTO vouchers (code, created_at) VALUES (?, NOW())";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$voucher_code]);
    }

    // 5. Return success
    echo json_encode([
        'status'  => 'success',
        'voucher' => $voucher_code,
        'message' => 'Voucher generated and saved successfully.'
    ]);

} catch (PDOException $e) {
    http_response_code(500);
    // Optionally log error: error_log($e->getMessage());
    echo json_encode([
        'status'  => 'error',
        'message' => 'Failed to connect to or save data in the database.'
    ]);
}
