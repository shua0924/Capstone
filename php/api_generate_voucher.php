<?php
$db   = 'wifi_hotspot';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$localhost;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// api_generate_voucher.php
header('Content-Type: application/json');
$voucher_code = 'CEC - WIFI HOTSPOT - ' . random_int(100, 999) . substr(md5(uniqid()), 0, 4);
echo json_encode(['voucher' => $voucher_code]);

try {
    // --- 2. Establish Connection ---
    $pdo = new PDO($dsn, $user, $pass, $options);

    // --- 3. Generate Voucher Code ---
    // A more robust method for generation
    $voucher_code = 'CEC - WIFI HOTSPOT - ' . random_int(100, 999) . substr(md5(uniqid(mt_rand(), true)), 0, 4);
    
    // Optional: Check if the code already exists (for very high-volume generation)
    // For simplicity, we skip the check here, relying on a unique index in the DB.

    // --- 4. Prepare SQL Insert Query ---
    $sql = "INSERT INTO vouchers (code, created_at) VALUES (?, NOW())";
    $stmt = $pdo->prepare($sql);

    // --- 5. Execute Query (Save to DB) ---
    // Using a prepared statement prevents SQL Injection
    $stmt->execute([$voucher_code]);
    
    // --- 6. Success Response ---
    echo json_encode([
        'status' => 'success',
        'voucher' => $voucher_code,
        'message' => 'Voucher generated and saved successfully.'
    ]);

} catch (PDOException $e) {
    // --- 7. Error Response ---
    // Log the error for debugging, but only send a generic message to the client
    // error_log($e->getMessage()); // Uncomment for logging

    http_response_code(500); // Set HTTP status code to 500 (Internal Server Error)
    echo json_encode([
        'status' => 'error',
        'message' => 'Failed to connect to or save data in the database.'
    ]);
}
?>
