<?php
// api_generate_voucher.php
header('Content-Type: application/json');
$voucher_code = 'load' . random_int(100, 999) . substr(md5(uniqid()), 0, 4);
echo json_encode(['voucher' => $voucher_code]);
