<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Sidebar</title>
  <script src="../css/tailwind.css"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

</head>

<body class="bg-gray-100">

  <div class="flex">
    <!-- Sidebar -->
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
          <a href="../php/Voucher.php" class="flex items-center space-x-3 hover:bg-gray-300 p-2 rounded">
            <svg width="25" height="25" viewBox="0 0 27 18" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M3 0C1.34531 0 0 1.34531 0 3V6C0 6.4125 0.346875 6.73594 0.735938 6.87188C1.61719 7.17656 2.25 8.01562 2.25 9C2.25 9.98438 1.61719 10.8234 0.735938 11.1281C0.346875 11.2641 0 11.5875 0 12V15C0 16.6547 1.34531 18 3 18H24C25.6547 18 27 16.6547 27 15V12C27 11.5875 26.6531 11.2641 26.2641 11.1281C25.3828 10.8234 24.75 9.98438 24.75 9C24.75 8.01562 25.3828 7.17656 26.2641 6.87188C26.6531 6.73594 27 6.4125 27 6V3C27 1.34531 25.6547 0 24 0H3ZM19.5 12.75V5.25H7.5V12.75H19.5ZM5.25 4.5C5.25 3.67031 5.92031 3 6.75 3H20.25C21.0797 3 21.75 3.67031 21.75 4.5V13.5C21.75 14.3297 21.0797 15 20.25 15H6.75C5.92031 15 5.25 14.3297 5.25 13.5V4.5Z"
                fill="black" />
            </svg>

            <span class="text-black text-xl">Voucher</span>
          </a>
        </li>
        <li>
          <a href="#" class="flex items-center space-x-3 hover:bg-gray-300 p-2 rounded">
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

    <!-- Main Content -->
    <div class="container mx-auto p-6 flex-1">
      <div class="flex justify-between items-center mb-16">
        <h1 class="text-2xl font-semibold text-black">User</h1>
        <div class="flex items-center space-x-2">
          <img src="../images/ceclogo.png" alt="CEC Logo" class="w-10 h-10 objection-contain">
          <span class="text-xl text-gray-800">Admin</span>
        </div>
      </div>
      <!-- Button to Open Modal -->
      <div class="flex justify-between">
        <div>
          <button id="openModalBtn"
            class="flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            <i class="fa-solid fa-plus"></i>
            <span class="font-semibold">Create User</span>
          </button>
        </div>

        <!-- Drop Down Courses and Year Level -->
        <div class="flex gap-2 ">
          <!-- Courses -->
          <div>
            <select
              class="bg-gray-100 border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring-1 focus:ring-blue-600 focus:outline-none">
              <option value="">Course</option>
              <option value="">BSIT</option>
              <option value="">BSHM</option>
              <option value="">BSTM</option>
              <option value="">BEED</option>
              <option value="">BSED</option>
              <option value="">BSCRIM</option>
            </select>
          </div>
          <!-- Year Level -->
          <div>
            <select
              class="bg-gray-100 border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring-1 focus:ring-blue-600 focus:outline-none">
              <option value="">Year Level</option>
              <option value="">1st Year</option>
              <option value="">2nd Year</option>
              <option value="">3rd Year</option>
              <option value="">4th Year</option>
            </select>
          </div>

          <!-- Searchbar -->
          <div>
            <input type="text" placeholder="Search user..."
              class="bg-white border border-gray-300 rounded-md px-3 py-2 text-sm w-56 focus:ring-1 focus:ring-blue-600 focus:outline-none">
          </div>
        </div>

      </div>

      <!-- Modal Background -->
      <div id="createUserModal"
        class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">

        <!-- Modal Content -->
        <div class="bg-white border rounded shadow-lg w-[420px] p-6 relative overflow-y-auto max-h-[90vh]">
          <!-- Header -->
          <div class="flex justify-between items-center border-b pb-3 mb-4">
            <h3 class="text-lg font-semibold text-gray-700">Create User</h3>

            <button id="closeModalBtn" class="text-gray-500 hover:text-gray-700 text-xl font-bold">×</button>
          </div>
          <!-- Name -->
          <div class="grid grid-cols-3 gap-2 mb-2">
            <div>
              <label class="block text-sm font-medium text-gray-700">First Name</label>
              <input type="text" placeholder="First"
                class="w-full mt-1 border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring-1 focus:ring-blue-600 focus:outline-none">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700">MI</label>
              <input type="text" placeholder="M"
                class="w-full mt-1 border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring-1 focus:ring-blue-600 focus:outline-none">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700">Last Name</label>
              <input type="text" placeholder="Last"
                class="w-full mt-1 border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring-1 focus:ring-blue-600 focus:outline-none">
            </div>
          </div>

          <!-- School ID -->
          <div class="flex gap-3 justify-between">
            <div class="">
              <label class="block text-sm font-medium text-gray-700">School ID</label>
              <input type="text" placeholder="Enter School ID" class="w-[14.5rem] mt-1 border border-gray-300 rounded-md px-3 py-2 text-sm 
                        focus:ring-1 focus:ring-blue-600 focus:outline-none">
            </div>

            <!-- Gender -->
            <div class="">
              <label class="block text-sm font-medium text-gray-700">Gender</label>
              <select
                class="w-[7rem] mt-1 border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring-1 focus:ring-blue-600 focus:outline-none">
                <option>Male</option>
                <option>Female</option>
              </select>
            </div>
          </div>

          <!-- Gmail -->
          <div class="mb-2">
            <label class="block text-sm font-medium text-gray-700">Gmail</label>
            <input type="email" placeholder="Enter Gmail"
              class="w-full mt-1 border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring-1 focus:ring-blue-600 focus:outline-none">
          </div>

          <!-- Contact -->
          <div class="mb-2">
            <label class="block text-sm font-medium text-gray-700">Contact</label>
            <input type="text" placeholder="09XXXXXXXXX"
              class="w-full mt-1 border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring-1 focus:ring-blue-600 focus:outline-none">
          </div>

          <!-- Course -->
          <div class="flex gap-4">
            <div class="flex-1">
              <label class="block text-sm font-medium text-gray-700">Course</label>
              <select
                class="w-full mt-1 border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring-1 focus:ring-blue-600 focus:outline-none">
                <option>BSIT</option>
                <option>BSED</option>
                <option>BEED</option>
                <option>BSHM</option>
                <option>BSTM</option>
                <option>BSCRIM</option>
              </select>
            </div>

            <!-- Year Level -->
            <div class="flex-1">
              <label class="block text-sm font-medium text-gray-700 center">Year Level</label>
              <select
                class="w-full mt-1 border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring-1 focus:ring-blue-600 focus:outline-none">
                <option>1st Year</option>
                <option>2nd Year</option>
                <option>3rd Year</option>
                <option>4th Year</option>
              </select>
            </div>
          </div>

          <!-- Generate Buttons -->
          <div class="flex justify-between space-x-3 mt-3">
            <button type="button" id="generateVoucher"
              class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 w-1/2">Generate
              Voucher</button>
            <button type="button" id="generatePassword"
              class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 w-1/2">Generate
              Password</button>
          </div>

          <!-- Success Message -->
          <div id="successMsg"
            class="hidden mt-3 text-green-800 bg-green-100 border border-green-300 rounded-md px-3 py-2 text-sm text-center">
            <strong>load145</strong> — Success! New user created successfully.
          </div>

          <!-- Role -->
          <div class="mt-3">
            <label class="block text-sm font-medium text-gray-700">Role</label>
            <div class="flex items-center space-x-6 mt-1">
              <label class="flex items-center space-x-1">
                <input type="radio" name="role" class="text-blue-600 focus:ring-blue-600" checked>
                <span>Student</span>
              </label>
            </div>
          </div>

          <!-- Save Button -->
          <div class="flex justify-end pt-3">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-md font-medium">Save
              User</button>
          </div>
          </form>
        </div>
      </div>

      <div class="w-[1055px] bg-white shadow-md rounded-lg overflow-hidden border border-blue-300 mt-4">
        <!-- Table -->
        <div class="overflow-x-auto">
          <table class="min-w-full border-collapse">
            <thead class="bg-[#4B6BFB] text-white">
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
              <tr class="hover:bg-gray-100 border-b border-gray-200">
                <td class="px-4 py-3 text-sm">123125</td>
                <td class="px-4 py-3 text-sm">Leandro Labos</td>
                <td class="px-4 py-3 text-sm">Leandro@gmail.com</td>
                <td class="px-4 py-3 text-sm">BS Information Technology</td>
                <td class="px-4 py-3 text-sm">2nd Year</td>
                <td class="px-4 py-3 text-sm text-green-600">Active</td>
                <td class="px-4 py-3 text-sm">
                  <div class="flex space-x-3">
                    <button class="text-blue-600 hover:text-blue-800" title="See More">
                      <i class="fa-solid fa-eye"></i>
                    </button>
                    <button class="text-green-600 hover:text-green-800">
                      <i class="fas fa-edit"></i>
                    </button>
                    <button class="text-red-600 hover:text-red-800">
                      <i class="fas fa-trash"></i>
                    </button>
                  </div>
                </td>
              </tr>

              <tr class="hover:bg-gray-100 border-b border-gray-200">
                <td class="px-4 py-3 text-sm">123126</td>
                <td class="px-4 py-3 text-sm">Gil Z. Arda</td>
                <td class="px-4 py-3 text-sm">Arda@gmail.com</td>
                <td class="px-4 py-3 text-sm">BS Computer Science</td>
                <td class="px-4 py-3 text-sm">3rd Year</td>
                <td class="px-4 py-3 text-sm text-green-600">Active</td>
                <td class="px-4 py-3 text-sm">
                  <div class="flex space-x-3">
                    <button class="text-blue-600 hover:text-blue-800" title="See More">
                      <i class="fa-solid fa-eye"></i>
                    </button>
                    <button class="text-green-600 hover:text-green-800">
                      <i class="fas fa-edit"></i>
                    </button>
                    <button class="text-red-600 hover:text-red-800">
                      <i class="fas fa-trash"></i>
                    </button>
                  </div>
                </td>
              </tr>

              <tr class="hover:bg-gray-100 border-b border-gray-200">
                <td class="px-4 py-3 text-sm">123126</td>
                <td class="px-4 py-3 text-sm">Gil Z. Arda</td>
                <td class="px-4 py-3 text-sm">Arda@gmail.com</td>
                <td class="px-4 py-3 text-sm">BS Computer Science</td>
                <td class="px-4 py-3 text-sm">3rd Year</td>
                <td class="px-4 py-3 text-sm text-green-600">Active</td>
                <td class="px-4 py-3 text-sm">
                  <div class="flex space-x-3">
                    <button class="text-blue-600 hover:text-blue-800" title="See More">
                      <i class="fa-solid fa-eye"></i>
                    </button>
                    <button class="text-green-600 hover:text-green-800">
                      <i class="fas fa-edit"></i>
                    </button>
                    <button class="text-red-600 hover:text-red-800">
                      <i class="fas fa-trash"></i>
                    </button>
                  </div>
                </td>
              </tr>

              <tr class="hover:bg-gray-100 border-b border-gray-200">
                <td class="px-4 py-3 text-sm">123126</td>
                <td class="px-4 py-3 text-sm">Gil Z. Arda</td>
                <td class="px-4 py-3 text-sm">Arda@gmail.com</td>
                <td class="px-4 py-3 text-sm">BS Computer Science</td>
                <td class="px-4 py-3 text-sm">3rd Year</td>
                <td class="px-4 py-3 text-sm text-green-600">Active</td>
                <td class="px-4 py-3 text-sm">
                  <div class="flex space-x-3">
                    <button class="text-blue-600 hover:text-blue-800" title="See More">
                      <i class="fa-solid fa-eye"></i>
                    </button>
                    <button class="text-green-600 hover:text-green-800">
                      <i class="fas fa-edit"></i>
                    </button>
                    <button class="text-red-600 hover:text-red-800">
                      <i class="fas fa-trash"></i>
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>


      </div>


      <script>
        const modal = document.getElementById('createUserModal');
        const openModalBtn = document.getElementById('openModalBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const successMsg = document.getElementById('successMsg');

        openModalBtn.addEventListener('click', () => modal.classList.remove('hidden'));
        closeModalBtn.addEventListener('click', () => modal.classList.add('hidden'));
        window.addEventListener('click', e => { if (e.target === modal) modal.classList.add('hidden'); });

        // Demo generator
        document.getElementById('generateVoucher').addEventListener('click', () => {
          successMsg.classList.remove('hidden');
          successMsg.querySelector('strong').textContent = 'load' + Math.floor(Math.random() * 900 + 100);
        });
      </script>
</body>

</html>