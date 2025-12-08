<?php
// api/generate_password.php
header('Content-Type: application/json');
require 'db.php'; // Include the PDO connection file that creates $pdo

// --- 1. Get User Identifier ---
// We expect the school_id to be sent from the JavaScript function
$target_school_id = $_POST['school_id'] ?? null;

if (!$target_school_id) {
    http_response_code(400);
    die(json_encode(['status' => 'error', 'error' => 'Missing school_id. Cannot generate password without user ID.']));
}

// --- 2. Generate and Hash Password ---
$length = 12;
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+-=[]{}|;:,.<>?';
$password = '';
for ($i = 0; $i < $length; $i++) {
    $password .= $characters[random_int(0, strlen($characters) - 1)];
}

// SECURITY CRITICAL: HASH the password before storing
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// --- 3. Update Database Record as 'Active' using PDO ---
$status = 'Active';
$sql = "UPDATE users_profile 
        SET password_generated = :password_hash, 
            status = :status 
        WHERE school_id = :school_id";

try {
    // PDO Prepare Statement
    $stmt = $pdo->prepare($sql);
    
    // PDO Bind Parameters
    $stmt->execute([
        ':password_hash' => $password_hash,
        ':status' => $status,
        ':school_id' => $target_school_id
    ]);

    $affected_rows = $stmt->rowCount();

    if ($affected_rows === 1) {
        http_response_code(200);
        
        // Success response: Return the PLAIN-TEXT password for the admin to see/copy.
        echo json_encode([
            'status' => 'success',
            'message' => "New password generated and instantly activated for School ID: $target_school_id.",
            'new_password' => $password // !!! CONFIRMATION !!!
        ]);
    } else {
        http_response_code(404);
        echo json_encode(['status' => 'error', 'error' => "School ID '$target_school_id' not found or record unchanged."]);
    }
} catch (PDOException $e) {
    // Catch database-related errors (e.g., table name wrong, column name wrong)
    http_response_code(500);
    echo json_encode([
        'status' => 'error', 
        'error' => 'Database execution failed.', 
        'details' => $e->getMessage()
    ]);
}
?>