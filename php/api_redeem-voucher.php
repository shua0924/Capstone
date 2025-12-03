<?php
// api_redeem_voucher.php
header('Content-Type: application/json');

// --- 1. Database Configuration ---
// Make sure these credentials match your environment
$host = 'localhost';
$db   = 'your_database_name';
$user = 'your_database_user';
$pass = 'your_database_password';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// --- 2. Input Validation ---
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['code']) || empty($_POST['code'])) {
    http_response_code(400); 
    echo json_encode(['status' => 'error', 'message' => 'Voucher code must be provided via POST.']);
    exit;
}
$voucher_code = trim($_POST['code']);

try {
    // --- 3. Establish Connection & Start Transaction ---
    $pdo = new PDO($dsn, $user, $pass, $options);
    $pdo->beginTransaction(); 

    // --- 4. CHECK: Voucher Exists and is UNUSED ---
    // The "FOR UPDATE" clause locks the row to prevent simultaneous redemption attempts.
    $sql_check = "SELECT used FROM vouchers WHERE code = ? FOR UPDATE";
    $stmt_check = $pdo->prepare($sql_check);
    $stmt_check->execute([$voucher_code]);
    $voucher = $stmt_check->fetch();

    if (!$voucher) {
        // Voucher code not found
        http_response_code(404);
        $message = 'Voucher code not found.';
    } elseif ($voucher['used'] == 1) {
        // Voucher code already used
        http_response_code(409);
        $message = 'Voucher code has already been redeemed.';
    }

    if (isset($message)) {
        echo json_encode(['status' => 'error', 'message' => $message]);
        $pdo->rollBack(); // Release the lock and end transaction
        exit;
    }

    // --- 5. REDEEM: Mark the voucher as used ---
    $sql_redeem = "UPDATE vouchers SET used = 1, used_at = NOW() WHERE code = ?";
    $stmt_redeem = $pdo->prepare($sql_redeem);
    $stmt_redeem->execute([$voucher_code]);
    
    // Commit the transaction to finalize the update
    $pdo->commit(); 

    // --- 6. Success Response ---
    http_response_code(200);
    echo json_encode([
        'status' => 'success',
        'code' => $voucher_code,
        'message' => 'Voucher successfully redeemed.'
    ]);

} catch (PDOException $e) {
    // Handle database connection or query errors
    if (isset($pdo) && $pdo->inTransaction()) {
        $pdo->rollBack();
    }
    http_response_code(500); 
    echo json_encode([
        'status' => 'error',
        'message' => 'An internal server error occurred during redemption. Check database connection.'
    ]);
}
?>