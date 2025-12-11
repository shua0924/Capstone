<?php
// User.php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Collect and sanitize POST data
  $first_name = trim($_POST['first_name'] ?? '');
  $middle_name = trim($_POST['middle_name'] ?? '');
  $last_name = trim($_POST['last_name'] ?? '');
  $school_id = trim($_POST['school_id'] ?? '');
  $gender = trim($_POST['gender'] ?? '');
  $gmail = trim($_POST['gmail'] ?? '');
  $contact_number = trim($_POST['contact_number'] ?? '');
  $course_name = trim($_POST['course_name'] ?? '');
  $year_level = trim($_POST['year_level'] ?? '');
  $user_type = trim($_POST['user_type'] ?? 'Student');

  // Simple validation example (you can extend this)
  $errors = [];
  if ($first_name === '')
    $errors[] = 'First name is required';
  if ($last_name === '')
    $errors[] = 'Last name is required';
  if ($school_id === '')
    $errors[] = 'Student ID is required';
  if ($gmail === '' || !filter_var($gmail, FILTER_VALIDATE_EMAIL))
    $errors[] = 'Valid email is required';

  if (empty($errors)) {
    // Insert into database
    $stmt = $pdo->prepare("INSERT INTO users_profile (first_name, middle_name, last_name, school_id, gender, gmail, contact_number, course_name, year_level, user_type, status, created_at) VALUES (:first_name, :middle_name, :last_name, :school_id, :gender, :gmail, :contact_number, :course_name, :year_level, :user_type, 'Active', NOW())");

    $stmt->execute([
      ':first_name' => $first_name,
      ':middle_name' => $middle_name,
      ':last_name' => $last_name,
      ':school_id' => $school_id,
      ':gender' => $gender,
      ':gmail' => $gmail,
      ':contact_number' => $contact_number,
      ':course_name' => $course_name,
      ':year_level' => $year_level,
      ':user_type' => $user_type
    ]);

    // Redirect to avoid form resubmission on refresh
    header("Location: User.php?created=1");
    exit;
  }
}
// Handle filters
$course_name = trim($_GET['course_name'] ?? '');
$year_level = trim($_GET['year_level'] ?? '');
$q = trim($_GET['q'] ?? '');

$sql = "SELECT * FROM users_profile WHERE 1=1";
$params = [];

if ($course_name !== '') {
  $sql .= " AND course_name = :course_name";
  $params[':course_name'] = $course_name;
}

if ($year_level !== '') {
  $sql .= " AND year_level = :year_level";
  $params[':year_level'] = $year_level;
}

if ($q !== '') {
  $sql .= " AND (
        school_id LIKE :q OR
        first_name LIKE :q OR
        last_name LIKE :q OR
        gmail LIKE :q
    )";
  $params[':q'] = "%$q%";
}

$sql .= " ORDER BY user_id DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$users = $stmt->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Users - WiFi Hotspot</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="../css/tailwind.css"></script>
</head>

<body class="bg-gray-100 h-screen">
  <div class="flex">
    <!-- Sidebar (you can paste your existing sidebar HTML) -->
    <div class="w-64 bg-gray h-screen p-8 text-white shadow-lg fixed">
      <div class="flex items-center space-x-2 mb-24">
        <h1 class="text-2xl font-semibold text-black">WiFi Hotspot</h1>
      </div>
      <!-- ...sidebar links... -->
      <ul class="space-y-5">
        <li><a href="admindashboard.php" class="flex items-center space-x-3 hover:bg-gray-300 p-2 rounded"><svg
              width="25" height="25" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M16.2746 0.501025C15.5538 -0.167009 14.4403 -0.167009 13.7254 0.501025L0.59807 12.6897C0.0354712 13.2171 -0.152062 14.0316 0.129238 14.7466C0.410537 15.4615 1.0962 15.9361 1.86978 15.9361H2.80744V26.2496C2.80744 28.3182 4.48937 30 6.5581 30H23.436C25.5048 30 27.1867 28.3182 27.1867 26.2496V15.9361H28.1244C28.8979 15.9361 29.5895 15.4615 29.8708 14.7466C30.1521 14.0316 29.9645 13.2113 29.4019 12.6897L16.2746 0.501025ZM14.0594 18.7489H15.9347C17.4877 18.7489 18.7477 20.0088 18.7477 21.5617V27.1872H11.2464V21.5617C11.2464 20.0088 12.5064 18.7489 14.0594 18.7489Z"
                fill="black" />
            </svg><span class="text-black text-xl">Dashboard</span></a></li>
        <li><a href="User.php" class="flex items-center space-x-3 hover:bg-gray-300 p-2 rounded"> <svg width="25"
              height="25" viewBox="0 0 30 22" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M15 0C17.6906 0 19.875 2.18437 19.875 4.875C19.875 7.56563 17.6906 9.75 15 9.75C12.3094 9.75 10.125 7.56563 10.125 4.875C10.125 2.18437 12.3094 0 15 0ZM4.5 3.375C6.36562 3.375 7.875 4.88438 7.875 6.75C7.875 8.61563 6.36562 10.125 4.5 10.125C2.63438 10.125 1.125 8.61563 1.125 6.75C1.125 4.88438 2.63438 3.375 4.5 3.375ZM0 18.75C0 15.4359 2.68594 12.75 6 12.75C6.6 12.75 7.18125 12.8391 7.72969 13.0031C6.1875 14.7281 5.25 17.0063 5.25 19.5V20.25C5.25 20.7844 5.3625 21.2906 5.56406 21.75H1.5C0.670312 21.75 0 21.0797 0 20.25V18.75ZM24.4359 21.75C24.6375 21.2906 24.75 20.7844 24.75 20.25V19.5C24.75 17.0063 23.8125 14.7281 22.2703 13.0031C22.8188 12.8391 23.4 12.75 24 12.75C27.3141 12.75 30 15.4359 30 18.75V20.25C30 21.0797 29.3297 21.75 28.5 21.75H24.4359ZM22.125 6.75C22.125 4.88438 23.6344 3.375 25.5 3.375C27.3656 3.375 28.875 4.88438 28.875 6.75C28.875 8.61563 27.3656 10.125 25.5 10.125C23.6344 10.125 22.125 8.61563 22.125 6.75ZM7.5 19.5C7.5 15.3562 10.8562 12 15 12C19.1437 12 22.5 15.3562 22.5 19.5V20.25C22.5 21.0797 21.8297 21.75 21 21.75H9C8.17031 21.75 7.5 21.0797 7.5 20.25V19.5Z"
                fill="black" />
            </svg><span class="text-black text-xl">User</span></a></li>
        <li><a href="../php/Voucher.php" class="flex items-center space-x-3 hover:bg-gray-300 p-2 rounded"><svg
              width="25" height="25" viewBox="0 0 27 18" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M3 0C1.34531 0 0 1.34531 0 3V6C0 6.4125 0.346875 6.73594 0.735938 6.87188C1.61719 7.17656 2.25 8.01562 2.25 9C2.25 9.98438 1.61719 10.8234 0.735938 11.1281C0.346875 11.2641 0 11.5875 0 12V15C0 16.6547 1.34531 18 3 18H24C25.6547 18 27 16.6547 27 15V12C27 11.5875 26.6531 11.2641 26.2641 11.1281C25.3828 10.8234 24.75 9.98438 24.75 9C24.75 8.01562 25.3828 7.17656 26.2641 6.87188C26.6531 6.73594 27 6.4125 27 6V3C27 1.34531 25.6547 0 24 0H3ZM19.5 12.75V5.25H7.5V12.75H19.5ZM5.25 4.5C5.25 3.67031 5.92031 3 6.75 3H20.25C21.0797 3 21.75 3.67031 21.75 4.5V13.5C21.75 14.3297 21.0797 15 20.25 15H6.75C5.92031 15 5.25 14.3297 5.25 13.5V4.5Z"
                fill="black" />
            </svg><span class="text-black text-xl">Voucher</span></a></li>
        <li><a href="../php/Analytics.php" class="flex items-center space-x-3 hover:bg-gray-300 p-2 rounded"><svg
              width="25" height="25" viewBox="0 0 24 21" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M9 2.25C9 1.00781 10.0078 0 11.25 0H12.75C13.9922 0 15 1.00781 15 2.25V18.75C15 19.9922 13.9922 21 12.75 21H11.25C10.0078 21 9 19.9922 9 18.75V2.25ZM0 11.25C0 10.0078 1.00781 9 2.25 9H3.75C4.99219 9 6 10.0078 6 11.25V18.75C6 19.9922 4.99219 21 3.75 21H2.25C1.00781 21 0 19.9922 0 18.75V11.25ZM20.25 3H21.75C22.9922 3 24 4.00781 24 5.25V18.75C24 19.9922 22.9922 21 21.75 21H20.25C19.0078 21 18 19.9922 18 18.75V5.25C18 4.00781 19.0078 3 20.25 3Z"
                fill="black" />
            </svg><span class="text-black text-xl">Analytics</span></a></li>
      </ul>
    </div>

    <div class="ml-64 h-screen overflow-x-hidden p-2">
      <div class="flex justify-between items-center mb-16">
        <h1 class="text-2xl font-semibold text-black pl-2">User</h1>
        <div class="flex items-center space-x-2">
          <img src="../images/ceclogo.png" alt="CEC Logo" class="w-10 h-10 object-contain">
          <span class="text-xl text-gray-800">Admin</span>
        </div>
      </div>

      <div class="flex justify-between mb-4">
        <div>
          <button id="openModalBtn"
            class="flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            <i class="fa-solid fa-plus"></i>
            <span class="font-semibold">Create User</span>
          </button>
        </div>

        <form method="get" id="filterForm" class="flex gap-4 items-center">
          <select name="course_name" id="course_name"
            class="bg-gray-100 border border-gray-300 rounded-md px-3 py-2 text-sm">
            <option value="">Course</option>
            <option value="BSIT" <?= $course_name === 'BSIT' ? 'selected' : '' ?>>BSIT</option>
            <option value="BSHM" <?= $course_name === 'BSHM' ? 'selected' : '' ?>>BSHM</option>
            <option value="BSTM" <?= $course_name === 'BSTM' ? 'selected' : '' ?>>BSTM</option>
            <option value="BEED" <?= $course_name === 'BEED' ? 'selected' : '' ?>>BEED</option>
            <option value="BSED" <?= $course_name === 'BSED' ? 'selected' : '' ?>>BSED</option>
            <option value="BSCRIM" <?= $course_name === 'BSCRIM' ? 'selected' : '' ?>>BSCRIM</option>
          </select>

          <select name="year_level" id="year_level"
            class="bg-gray-100 border border-gray-300 rounded-md px-3 py-2 text-sm">
            <option value="">Year Level</option>
            <option <?= $year_level === '1st Year' ? 'selected' : '' ?>>1st Year</option>
            <option <?= $year_level === '2nd Year' ? 'selected' : '' ?>>2nd Year</option>
            <option <?= $year_level === '3rd Year' ? 'selected' : '' ?>>3rd Year</option>
            <option <?= $year_level === '4th Year' ? 'selected' : '' ?>>4th Year</option>
          </select>

          <input type="text" name="q" id="search_user" value="<?= htmlentities($q) ?>" placeholder="Search user..."
            class="bg-white border border-gray-300 rounded-md px-3 py-2 text-sm w-56">
          <button type="submit" class="bg-blue-600 text-white px-3 py-2 rounded">Filter</button>
        </form>
      </div>

      <!-- Modal -->
      <div id="createUserModal"
        class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <form id="createUserForm" method="post" action="" novalidate>
          <div class="bg-white border rounded shadow-lg w-[420px] p-6 relative overflow-y-auto max-h-[90vh]">
            <div class="flex justify-between items-center border-b pb-3 mb-4">
              <h3 class="text-lg font-semibold text-gray-700">Create User</h3>
              <button id="closeModalBtn" class="text-gray-500 hover:text-gray-700 text-xl font-bold">×</button>
            </div>

            <div class="grid grid-cols-3 gap-2 mb-2">
              <div>
                <label class="block text-sm font-medium text-gray-700">First Name</label>
                <input id="first_name" name="first_name" required type="text" placeholder="First"
                  class="w-full mt-1 border rounded px-3 py-2 text-sm">
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700">MI</label>
                <input id="middle_name" name="middle_name" type="text" placeholder="M"
                  class="w-full mt-1 border rounded px-3 py-2 text-sm">
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700">Last Name</label>
                <input id="last_name" name="last_name" required type="text" placeholder="Last"
                  class="w-full mt-1 border rounded px-3 py-2 text-sm">
              </div>
            </div>

            <div class="flex gap-3 justify-between">
              <div>
                <label class="block text-sm font-medium text-gray-700">Student ID</label>
                <input id="school_id" name="school_id" required type="text" placeholder="Enter Student ID"
                  class="w-[14.5rem] mt-1 border rounded px-3 py-2 text-sm">
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700">Gender</label>
                <select id="gender" name="gender" class="w-[7rem] mt-1 border rounded px-3 py-2 text-sm">
                  <option>Male</option>
                  <option>Female</option>
                  <option>Other</option>
                </select>
              </div>
            </div>

            <div class="mb-2">
              <label class="block text-sm font-medium text-gray-700">Gmail</label>
              <input id="gmail" name="gmail" required type="email" placeholder="Enter Gmail"
                class="w-full mt-1 border rounded px-3 py-2 text-sm">
            </div>

            <div class="mb-2">
              <label class="block text-sm font-medium text-gray-700">Contact</label>
              <input id="contact_number" name="contact_number" type="text" placeholder="09XXXXXXXXX"
                class="w-full mt-1 border rounded px-3 py-2 text-sm">
            </div>

            <div class="flex gap-4">
              <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700">Course</label>
                <select id="course_name" name="course_name" class="w-full mt-1 border rounded px-3 py-2 text-sm">
                  <option value="BSIT">BSIT</option>
                  <option value="BSED">BSED</option>
                  <option value="BEED">BEED</option>
                  <option value="BSHM">BSHM</option>
                  <option value="BSTM">BSTM</option>
                  <option value="BSCRIM">BSCRIM</option>
                </select>
              </div>

              <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700">Year Level</label>
                <select id="year_level" name="year_level" class="w-full mt-1 border rounded px-3 py-2 text-sm">
                  <option>1st Year</option>
                  <option>2nd Year</option>
                  <option>3rd Year</option>
                  <option>4th Year</option>
                </select>
              </div>
            </div>


            <div id="successMsg"
              class="hidden mt-3 text-green-800 bg-green-100 border border-green-300 rounded-md px-3 py-2 text-sm text-center">
              <strong id="successCode"></strong> — Success! New user created successfully.
            </div>

            <div class="mt-3">
              <label class="block text-sm font-medium text-gray-700">Role</label>
              <div class="flex items-center space-x-6 mt-1">
                <label class="flex items-center space-x-1">
                  <input type="radio" name="user_type" value="Student" checked>
                  <span>Student</span>
                </label>
              </div>
            </div>

            <div class="flex justify-end pt-3">
              <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-md font-medium">Save
                User</button>
            </div>
        </form>
      </div>
    </div>

    <!-- table side  -->
    <div class="w-[1080px] bg-white shadow-md rounded-lg overflow-hidden border border-blue-300 mt-4">
      <div class="">
        <table class="min-w-full border-collapse">
          <thead class="bg-[#4B6BFB] text-white sticky top-0 z-10">
            <tr>
              <th class="px-4 py-3 text-left text-sm font-semibold border-b border-blue-300">Student ID</th>
              <th class="px-4 py-3 text-left text-sm font-semibold border-b border-blue-300">Name</th>
              <th class="px-4 py-3 text-left text-sm font-semibold border-b border-blue-300">Email</th>
              <th class="px-4 py-3 text-left text-sm font-semibold border-b border-blue-300">Course</th>
              <th class="px-4 py-3 text-left text-sm font-semibold border-b border-blue-300">Year Level</th>
              <th class="px-4 py-3 text-left text-sm font-semibold border-b border-blue-300">Status</th>
              <th class="px-4 py-3 text-left text-sm font-semibold border-b border-blue-300">Action</th>
            </tr>
          </thead>

          <tbody class="bg-white">
            <?php foreach ($users as $u): ?>
              <tr class="hover:bg-gray-100 border-b border-gray-200 group relatives">
                <td class="px-4 py-3 text-sm"><?= htmlentities($u['school_id']) ?></td>
                <td class="px-4 py-3 text-sm">
                  <?= htmlentities($u['first_name'] . ' ' . ($u['middle_name'] ? $u['middle_name'] . ' ' : '') . $u['last_name']) ?>
                </td>
                <td class="px-4 py-3 text-sm"><?= htmlentities($u['gmail']) ?></td>
                <td class="px-4 py-3 text-sm"><?= htmlentities($u['course_name']) ?></td>
                <td class="px-4 py-3 text-sm"><?= htmlentities($u['year_level']) ?></td>
                <td class="px-4 py-3 text-sm <?= $u['status'] === 'Active' ? 'text-green-600' : 'text-red-600' ?>">
                  <?= htmlentities($u['status']) ?>
                </td>
                <td class="px-4 py-3 text-sm ">
                  <div class="relative inline-block text-left">
                    <button type="button"
                      class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none"
                      id="dropdownButton<?= $u['user_id'] ?>" aria-expanded="true" aria-haspopup="true"
                      onclick="toggleDropdown(<?= $u['user_id'] ?>)">
                      Actions
                      <i class="fa-solid fa-chevron-down ml-2"></i>
                    </button>

                    <div id="dropdownMenu<?= $u['user_id'] ?>"
                      class="hidden origin-top-right absolute right-0 mt-2 w-44 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
                      <div class="py-1" role="menu" aria-orientation="vertical"
                        aria-labelledby="dropdownButton<?= $u['user_id'] ?>">
                        <a href="view_user.php?id=<?= $u['user_id'] ?>"
                          class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">View</a>
                        <a href="edit_user.php?id=<?= $u['user_id'] ?>"
                          class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Edit</a>
                        <button onclick="deleteUser(<?= $u['user_id'] ?>)"
                          class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100"
                          role="menuitem">Delete</button>
                        <button onclick="generateVoucher(<?= $u['user_id'] ?>)"
                          class="w-full text-left px-4 py-2 text-sm text-purple-600 hover:bg-gray-100"
                          role="menuitem">Generate Voucher</button>
                        <button onclick="generatePassword('<?= htmlentities($u['school_id']) ?>')"
                          class="w-full text-left px-4 py-2 text-sm text-purple-600 hover:bg-gray-100"
                          role="menuitem">Generate Password</button>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>


    <!-- Success Modal -->
    <div id="successModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
      <div class="bg-white rounded-lg shadow-lg p-6 w-96 max-w-full text-center relative">
        <!-- Close X -->
        <button id="closeSuccessModal"
          class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-xl font-bold">×</button>

        <!-- Icon and message -->
        <i class="fa-solid fa-circle-check text-green-500 text-4xl mb-3"></i>
        <h3 class="text-lg font-semibold text-gray-700 mb-2">Success!</h3>
        <p class="text-gray-600 mb-4">New user has been successfully created.</p>

        <!-- OK button -->
        <button id="okSuccessModal" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded font-medium">
          OK
        </button>
      </div>
    </div>

    <!-- delete Modal -->
     <!-- Delete Modal -->
<div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
  <div class="bg-white rounded-lg shadow-lg w-96 p-6 relative">
    <h2 class="text-lg font-semibold mb-4">Delete User</h2>
    <p class="mb-6">Are you sure you want to delete this user? This action cannot be undone.</p>
    <div class="flex justify-end space-x-2">
      <button id="cancelDelete" class="px-4 py-2 rounded border border-gray-300 hover:bg-gray-100">Cancel</button>
      <button id="confirmDelete" class="px-4 py-2 rounded bg-red-600 text-white hover:bg-red-700">Delete</button>
    </div>
    <button id="closeModal" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800">&times;</button>
  </div>
</div>


  </div>

  <script>
    // Dropdown function
    function toggleDropdown(userId) {
      const menu = document.getElementById('dropdownMenu' + userId);
      menu.classList.toggle('hidden');

      // Optional: close other dropdowns
      document.querySelectorAll('[id^="dropdownMenu"]').forEach(el => {
        if (el.id !== 'dropdownMenu' + userId) {
          el.classList.add('hidden');
        }
      });
    }

    // Close dropdown if clicked outside
    window.addEventListener('click', function (e) {
      document.querySelectorAll('[id^="dropdownMenu"]').forEach(menu => {
        const button = menu.previousElementSibling;
        if (!menu.contains(e.target) && !button.contains(e.target)) {
          menu.classList.add('hidden');
        }
      });
    });


    // Successfully js for moadal
    document.addEventListener("DOMContentLoaded", () => {
      const successModal = document.getElementById("successModal");
      const closeBtn = document.getElementById("closeSuccessModal");
      const okBtn = document.getElementById("okSuccessModal");

      const urlParams = new URLSearchParams(window.location.search);
      if (urlParams.get('created') === '1') {
        successModal.classList.remove('hidden');
      }

      // Close modal with X or OK
      closeBtn.addEventListener('click', () => successModal.classList.add('hidden'));
      okBtn.addEventListener('click', () => successModal.classList.add('hidden'));

      // Close on outside click
      successModal.addEventListener('click', (e) => {
        if (e.target === successModal) successModal.classList.add('hidden');
      });
    });



    const modal = document.getElementById('createUserModal');
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const successMsg = document.getElementById('successMsg');
    const successCode = document.getElementById('successCode');

    openModalBtn.addEventListener('click', () => modal.classList.remove('hidden'));
    closeModalBtn.addEventListener('click', () => modal.classList.add('hidden'));
    window.addEventListener('click', e => { if (e.target === modal) modal.classList.add('hidden'); });

    document.getElementById('generateVoucher').addEventListener('click', async () => {
      try {
        const r = await axios.get('api_generate_voucher.php');
        const code = r.data.voucher;
        // show toast / success
        successMsg.classList.remove('hidden');
        successCode.textContent = code;
      } catch (err) {
        alert('Could not generate voucher');
      }
    });

    // New function to generate password and submit it to the API
    // New function to generate password and submit it to the API
    async function generatePassword(schoolId) {
        if (!confirm("Generate and immediately activate a new password for School ID: " + schoolId + "?")) {
            return;
        }

        try {
            // Use axios.post to send the school ID to the PHP API
            const response = await axios.post('api_generate_password.php', new URLSearchParams({
                school_id: schoolId
            }));

            const data = response.data;

            if (data.status === 'success') {
                const newPassword = data.new_password;

                // 1. Copy to clipboard
                await navigator.clipboard.writeText(newPassword);

                // 2. Alert/Echo Confirmation (as requested)
                alert(
                    "Password Successfully GENERATED and ACTIVATED!" +
                    "\n\nSchool ID: " + schoolId +
                    "\nNew Password: " + newPassword +
                    "\n\n(It has been copied to your clipboard.)"
                );
                
                // 3. Reload the table to show the Active status change
                location.reload(); 

            } else {
                // Handle API errors
                alert("Error generating password: " + (data.error || 'Unknown API error.'));
            }
        } catch (error) {
            // Handle network/server errors
            console.error("Axios Error:", error);
            alert("Failed to connect to the server. Check the 'api_generate_password.php' file.");
        }
    }

    // delete user
    async function deleteUser(id) {
      if (!confirm('Delete this user?')) return;
      try {
        const r = await axios.post('delete_user.php', new URLSearchParams({ id }));
        if (r.data.success) location.reload();
        else alert('Delete failed: ' + (r.data.error || 'unknown'));
      } catch (err) {
        alert('Delete failed');
      }
    }
    <?php if (!empty($errors)): ?>
      // Open modal on validation errors
      document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('createUserModal').classList.remove('hidden');
        alert('<?= implode("\\n", $errors) ?>');
      });
    <?php elseif (isset($_GET['created'])): ?>
      // Optionally open modal or show success toast here
    <?php endif; ?>

    document.addEventListener("DOMContentLoaded", () => {

      const courseSelect = document.getElementById("course_name");
      const yearSelect = document.getElementById("year_level");
      const searchInput = document.getElementById("search_user");
      const filterForm = document.getElementById("filterForm");

      function autoFilter() {
        filterForm.submit();
      }

      // Auto submit on select change
      courseSelect.addEventListener("change", autoFilter);
      yearSelect.addEventListener("change", autoFilter);

      // Auto search on typing (with delay)
      searchInput.addEventListener("keyup", function () {
        clearTimeout(window._searchDelay);
        window._searchDelay = setTimeout(() => {
          autoFilter();
        }, 400);
      });

    });


    // Generate voucher
    function generateVoucher(userId) {
    if (!confirm("Generate voucher for this user?")) return;

    fetch("api_generate_voucher.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "user_profile_id=" + userId
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === "success") {
            // Access the voucher code from object
            alert("Voucher Generated:\n\n" + data.voucher.code);
        } else {
            alert("Error: " + data.message);
        }
    })
    .catch(error => {
        console.error("Error:", error);
        alert("Something went wrong while generating the voucher.");
    });
}


  </script>
</body>

</html>