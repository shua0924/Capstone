<?php 
require 'db.php';

// --- FIX 1: Change 'v.status' to 'v.used' in the SELECT list ---
$sql = "
    SELECT
        v.code,
        v.used,                     -- Now selecting the 'used' column (0 or 1)
        v.created_at,
        v.time_limit_minutes,
        v.used_at,                  -- Added v.used_at to calculate expiration properly
        CONCAT(u.first_name, ' ', u.last_name) AS full_name
    FROM vouchers v
    LEFT JOIN users_profile u ON v.id = u.user_id
    ORDER BY v.id DESC
";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $vouchers = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Basic error handling for database connection/query issues
    die("Database Error: " . $e->getMessage());
}

/**
 * Helper function to calculate the expiration time.
 * This is necessary because the table displays 'Expiration Date',
 * which depends on the voucher being used or not.
 */
function calculate_expiration($voucher) {
    // If the voucher is used, expiration starts from the time it was used.
    $start_timestamp = strtotime($voucher['used_at'] ?? $voucher['created_at']);
    $minutes = (int)$voucher['time_limit_minutes'];
    
    // Calculate expiration time (used_at + time_limit_minutes, or created_at + time_limit_minutes if unused)
    $expiration_timestamp = $start_timestamp + ($minutes * 60);

    // If the voucher is unused (used=0), the "expiration" is just the potential max lifetime.
    // If the voucher is used (used=1), check if the current time is past expiration.
    if ($voucher['used'] == 1 && time() > $expiration_timestamp) {
        return ['text' => 'Expired', 'class' => 'red'];
    } elseif ($voucher['used'] == 1) {
        return ['text' => date("M d, Y H:i", $expiration_timestamp), 'class' => 'green'];
    } else {
        // For unused vouchers, display the time limit, not a specific date.
        return ['text' => $minutes . " Mins (Unused)", 'class' => 'gray'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voucher Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <script src="../css/tailwind.css"></script>
</head>

<body class="bg-gray-100">

    <div class="flex">
        <div class="w-64 bg-white-200 h-screen p-8 text-white shadow-lg overflow-y-auto">
            <div class="flex items-center space-x-2 mb-24">
                <h1 class="text-2xl font-semibold text-black">WiFi Hotspot</h1>
            </div>
            <ul class="space-y-5">
                <li>
                    <a href="admindashboard.php" class="flex items-center space-x-3 hover:bg-gray-300 p-2 rounded">
                        <svg width="25" height="25" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16.2746 0.501025C15.5538 -0.167009 14.4403 -0.167009 13.7254 0.501025L0.59807 12.6897C0.0354712 13.2171 -0.152062 14.0316 0.129238 14.7466C0.410537 15.4615 1.0962 15.9361 1.86978 15.9361H2.80744V26.2496C2.80744 28.3182 4.48937 30 6.5581 30H23.436C25.5048 30 27.1867 28.3182 27.1867 26.2496V15.9361H28.1244C28.8979 15.9361 29.5895 15.4615 29.8708 14.7466C30.1521 14.0316 29.9645 13.2113 29.4019 12.6897L16.2746 0.501025ZM14.0594 18.7489H15.9347C17.4877 18.7489 18.7477 20.0088 18.7477 21.5617V27.1872H11.2464V21.5617C11.2464 20.0088 12.5064 18.7489 14.0594 18.7489Z"
                                fill="black" />
                        </svg>
                        <span class="text-black text-xl">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="../php/User.php" class="flex items-center space-x-3 hover:bg-gray-300 p-2 rounded">
                        <svg width="25" height="25" viewBox="0 0 30 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15 0C17.6906 0 19.875 2.18437 19.875 4.875C19.875 7.56563 17.6906 9.75 15 9.75C12.3094 9.75 10.125 7.56563 10.125 4.875C10.125 2.18437 12.3094 0 15 0ZM4.5 3.375C6.36562 3.375 7.875 4.88438 7.875 6.75C7.875 8.61563 6.36562 10.125 4.5 10.125C2.63438 10.125 1.125 8.61563 1.125 6.75C1.125 4.88438 2.63438 3.375 4.5 3.375ZM0 18.75C0 15.4359 2.68594 12.75 6 12.75C6.6 12.75 7.18125 12.8391 7.72969 13.0031C6.1875 14.7281 5.25 17.0063 5.25 19.5V20.25C5.25 20.7844 5.3625 21.2906 5.56406 21.75H1.5C0.670312 21.75 0 21.0797 0 20.25V18.75ZM24.4359 21.75C24.6375 21.2906 24.75 20.7844 24.75 20.25V19.5C24.75 17.0063 23.8125 14.7281 22.2703 13.0031C22.8188 12.8391 23.4 12.75 24 12.75C27.3141 12.75 30 15.4359 30 18.75V20.25C30 21.0797 29.3297 21.75 28.5 21.75H24.4359ZM22.125 6.75C22.125 4.88438 23.6344 3.375 25.5 3.375C27.3656 3.375 28.875 4.88438 28.875 6.75C28.875 8.61563 27.3656 10.125 25.5 10.125C23.6344 10.125 22.125 8.61563 22.125 6.75ZM7.5 19.5C7.5 15.3562 10.8562 12 15 12C19.1437 12 22.5 15.3562 22.5 19.5V20.25C22.5 21.0797 21.8297 21.75 21 21.75H9C8.17031 21.75 7.5 21.0797 7.5 20.25V19.5Z"
                                fill="black" />
                        </svg>
                        <span class="text-black text-xl">User</span>
                    </a>
                </li>
                <li>
                    <a href="../php/Voucher.php"
                        class="flex items-center space-x-3 hover:bg-gray-300 p-2 rounded bg-gray-200">
                        <svg width="25" height="25" viewBox="0 0 27 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3 0C1.34531 0 0 1.34531 0 3V6C0 6.4125 0.346875 6.73594 0.735938 6.87188C1.61719 7.17656 2.25 8.01562 2.25 9C2.25 9.98438 1.61719 10.8234 0.735938 11.1281C0.346875 11.2641 0 11.5875 0 12V15C0 16.6547 1.34531 18 3 18H24C25.6547 18 27 16.6547 27 15V12C27 11.5875 26.6531 11.2641 26.2641 11.1281C25.3828 10.8234 24.75 9.98438 24.75 9C24.75 8.01562 25.3828 7.17656 26.2641 6.87188C26.6531 6.73594 27 6.4125 27 6V3C27 1.34531 25.6547 0 24 0H3ZM19.5 12.75V5.25H7.5V12.75H19.5ZM5.25 4.5C5.25 3.67031 5.92031 3 6.75 3H20.25C21.0797 3 21.75 3.67031 21.75 4.5V13.5C21.75 14.3297 21.0797 15 20.25 15H6.75C5.92031 15 5.25 14.3297 5.25 13.5V4.5Z"
                                fill="black" />
                        </svg>

                        <span class="text-black text-xl">Voucher</span>
                    </a>
                </li>
                <li>
                    <a href="../php/Analytics.php" class="flex items-center space-x-3 hover:bg-gray-300 p-2 rounded">
                        <svg width="25" height="25" viewBox="0 0 24 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9 2.25C9 1.00781 10.0078 0 11.25 0H12.75C13.9922 0 15 1.00781 15 2.25V18.75C15 19.9922 13.9922 21 12.75 21H11.25C10.0078 21 9 19.9922 9 18.75V2.25ZM0 11.25C0 10.0078 1.00781 9 2.25 9H3.75C4.99219 9 6 10.0078 6 11.25V18.75C6 19.9922 4.99219 21 3.75 21H2.25C1.00781 21 0 19.9922 0 18.75V11.25ZM20.25 3H21.75C22.9922 3 24 4.00781 24 5.25V18.75C24 19.9922 22.9922 21 21.75 21H20.25C19.0078 21 18 19.9922 18 18.75V5.25C18 4.00781 19.0078 3 20.25 3Z"
                                fill="black" />
                        </svg>
                        <span class="text-black text-xl">Analytics</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="container mx-auto p-6 flex-1">
            <div class="flex justify-between items-center mb-10">
                <h1 class="text-2xl font-semibold text-black">Voucher </h1>
                <div class="flex items-center space-x-2">
                    <img src="../images/ceclogo.png" alt="CEC Logo" class="w-10 h-10 objection-contain">
                    <span class="text-xl text-gray-800">Admin</span>
                </div>
            </div>

            <div class="flex justify-between items-center py-4">
                <input type="text" placeholder="Search..."
                    class="bg-white border border-gray-300 rounded-md px-3 py-2 text-sm w-64 focus:ring-1 focus:ring-blue-600 focus:outline-none">
            </div>

            <div class="bg-white shadow-md rounded-lg overflow-hidden border border-blue-300">
                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse">
                        <thead class="bg-[#4B6BFB] text-white">
                            <tr>
                                <th class="px-4 py-3 text-left text-sm font-semibold border-b border-blue-300">Voucher Code</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold border-b border-blue-300">Name</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold border-b border-blue-300">Status</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold border-b border-blue-300">Created At</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold border-b border-blue-300">Expiration Info</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold border-b border-blue-300">Action</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">

                            <?php foreach ($vouchers as $v): ?>
                            <tr class="hover:bg-gray-100 border-b border-gray-200">

                                <td class="px-4 py-3 text-sm font-medium">
                                    <?= htmlspecialchars($v['code']) ?>
                                </td>

                                <td class="px-4 py-3 text-sm">
                                    <?= htmlspecialchars($v['full_name'] ?? 'Unknown User') ?>
                                </td>

                                <td class="px-4 py-3 text-sm">
                                    <?php if ($v['used'] == 0): ?>
                                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-semibold">
                                            Active (Unused)
                                        </span>
                                    <?php else: 
                                        $exp_status = calculate_expiration($v);
                                        $status_text = ($exp_status['text'] == 'Expired') ? 'Expired' : 'Used';
                                        $status_class = ($exp_status['text'] == 'Expired') ? 'red' : 'blue';
                                    ?>
                                        <span class="bg-<?= $status_class ?>-100 text-<?= $status_class ?>-700 px-2 py-1 rounded-full text-xs font-semibold">
                                            <?= $status_text ?>
                                        </span>
                                    <?php endif; ?>
                                </td>

                                <td class="px-4 py-3 text-sm">
                                    <?= date("M d, Y", strtotime($v['created_at'])) ?>
                                </td>

                                <td class="px-4 py-3 text-sm">
                                    <?php 
                                        $exp_info = calculate_expiration($v);
                                        $color_class = [
                                            'green' => 'text-green-600 font-semibold',
                                            'red' => 'text-red-600 font-bold',
                                            'gray' => 'text-gray-500',
                                        ][$exp_info['class']] ?? 'text-gray-500';
                                    ?>
                                    <span class="<?= $color_class ?>">
                                        <?= $exp_info['text'] ?>
                                    </span>
                                </td>

                                <td class="px-4 py-3 text-sm">
                                    <div class="flex space-x-3">
                                        <button class="text-blue-600 hover:text-blue-800" title="See More">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                        <button class="text-green-600 hover:text-green-800" title="Edit">
                                            <i class="fa-solid fa-edit"></i>
                                        </button>
                                        <button class="text-red-600 hover:text-red-800" title="Delete">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>