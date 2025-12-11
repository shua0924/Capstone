<?php
// api_generate_voucher.php
header('Content-Type: application/json');

// Database config
$db   = 'wifi_hotspot';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
$host = 'localhost';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);

    // Get user_profile_id from request (required)
    $user_profile_id = isset($_POST['user_profile_id']) ? intval($_POST['user_profile_id']) : null;
    if (!$user_profile_id) {
        throw new Exception("Missing user_profile_id. Voucher must be assigned to a user.");
    }

    // Generate voucher code
    $voucher_code = 'CEC - WIFI HOTSPOT - ' . random_int(100, 999) . substr(md5(uniqid(mt_rand(), true)), 0, 4);

    // Insert voucher into DB
    $sql = "INSERT INTO vouchers (user_profile_id, code, created_at) VALUES (?, ?, NOW())";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_profile_id, $voucher_code]);

    // Fetch the newly created voucher with user info
    $sql = "
        SELECT v.code, v.used, v.created_at, CONCAT(u.first_name, ' ', u.last_name) AS full_name
        FROM vouchers v
        JOIN users_profile u ON v.user_profile_id = u.user_id
        WHERE v.id = ?
    ";
    $voucher_id = $pdo->lastInsertId();
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$voucher_id]);
    $voucher = $stmt->fetch();

    echo json_encode([
        'status'  => 'success',
        'voucher' => $voucher,
        'message' => 'Voucher generated and saved successfully.'
    ]);

} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        'status'  => 'error',
        'message' => $e->getMessage()
    ]);
}
