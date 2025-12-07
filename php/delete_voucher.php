<?php
require 'db.php';

if (!isset($_POST['code'])) {
    echo json_encode(['success' => false, 'error' => 'No code provided']);
    exit;
}

$code = $_POST['code'];

try {
    $stmt = $pdo->prepare("DELETE FROM vouchers WHERE code = ?");
    $stmt->execute([$code]);
    if ($stmt->rowCount() === 0) {
        echo json_encode(['success' => false, 'error' => 'Voucher not found']);
        exit;
    }
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
