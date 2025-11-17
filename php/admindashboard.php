<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Sidebar</title>
    <script src="../css/tailwind.css"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-100">
        <div class="flex ">
            <!-- Sidebar -->
            <div class=" w-64 bg-white-200 h-screen  p-8 text-white shadow-lg overflow-y-auto">
                <div class="flex items-center space-x-2 mb-24">
                    <h1 class="text-2xl font-semibold text-black">WiFi Hotspot</h1>
                </div>
                <ul class="space-y-5">
                    <li>
                        <a href="../php/admindashboard.php"
                            class="flex items-center space-x-3 hover:bg-gray-300 p-2 rounded">
                            <svg width="25" height="25" viewBox="0 0 30 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.2746 0.501025C15.5538 -0.167009 14.4403 -0.167009 13.7254 0.501025L0.59807 12.6897C0.0354712 13.2171 -0.152062 14.0316 0.129238 14.7466C0.410537 15.4615 1.0962 15.9361 1.86978 15.9361H2.80744V26.2496C2.80744 28.3182 4.48937 30 6.5581 30H23.436C25.5048 30 27.1867 28.3182 27.1867 26.2496V15.9361H28.1244C28.8979 15.9361 29.5895 15.4615 29.8708 14.7466C30.1521 14.0316 29.9645 13.2113 29.4019 12.6897L16.2746 0.501025ZM14.0594 18.7489H15.9347C17.4877 18.7489 18.7477 20.0088 18.7477 21.5617V27.1872H11.2464V21.5617C11.2464 20.0088 12.5064 18.7489 14.0594 18.7489Z"
                                    fill="black" />
                            </svg>

                            <span class="text-black text-xl">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="../php/User.php" class="flex items-center space-x-3 hover:bg-gray-300 p-2 rounded">

                            <svg width="25" height="25" viewBox="0 0 30 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15 0C17.6906 0 19.875 2.18437 19.875 4.875C19.875 7.56563 17.6906 9.75 15 9.75C12.3094 9.75 10.125 7.56563 10.125 4.875C10.125 2.18437 12.3094 0 15 0ZM4.5 3.375C6.36562 3.375 7.875 4.88438 7.875 6.75C7.875 8.61563 6.36562 10.125 4.5 10.125C2.63438 10.125 1.125 8.61563 1.125 6.75C1.125 4.88438 2.63438 3.375 4.5 3.375ZM0 18.75C0 15.4359 2.68594 12.75 6 12.75C6.6 12.75 7.18125 12.8391 7.72969 13.0031C6.1875 14.7281 5.25 17.0063 5.25 19.5V20.25C5.25 20.7844 5.3625 21.2906 5.56406 21.75H1.5C0.670312 21.75 0 21.0797 0 20.25V18.75ZM24.4359 21.75C24.6375 21.2906 24.75 20.7844 24.75 20.25V19.5C24.75 17.0063 23.8125 14.7281 22.2703 13.0031C22.8188 12.8391 23.4 12.75 24 12.75C27.3141 12.75 30 15.4359 30 18.75V20.25C30 21.0797 29.3297 21.75 28.5 21.75H24.4359ZM22.125 6.75C22.125 4.88438 23.6344 3.375 25.5 3.375C27.3656 3.375 28.875 4.88438 28.875 6.75C28.875 8.61563 27.3656 10.125 25.5 10.125C23.6344 10.125 22.125 8.61563 22.125 6.75ZM7.5 19.5C7.5 15.3562 10.8562 12 15 12C19.1437 12 22.5 15.3562 22.5 19.5V20.25C22.5 21.0797 21.8297 21.75 21 21.75H9C8.17031 21.75 7.5 21.0797 7.5 20.25V19.5Z"
                                    fill="black" />
                            </svg>

                            <span class="text-black text-xl">User</span>
                        </a>
                    </li>
                    <li>
                        <a href="../php/Voucher.php" class="flex items-center space-x-3 hover:bg-gray-300 p-2 rounded">

                            <svg width="25" height="25" viewBox="0 0 27 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3 0C1.34531 0 0 1.34531 0 3V6C0 6.4125 0.346875 6.73594 0.735938 6.87188C1.61719 7.17656 2.25 8.01562 2.25 9C2.25 9.98438 1.61719 10.8234 0.735938 11.1281C0.346875 11.2641 0 11.5875 0 12V15C0 16.6547 1.34531 18 3 18H24C25.6547 18 27 16.6547 27 15V12C27 11.5875 26.6531 11.2641 26.2641 11.1281C25.3828 10.8234 24.75 9.98438 24.75 9C24.75 8.01562 25.3828 7.17656 26.2641 6.87188C26.6531 6.73594 27 6.4125 27 6V3C27 1.34531 25.6547 0 24 0H3ZM19.5 12.75V5.25H7.5V12.75H19.5ZM5.25 4.5C5.25 3.67031 5.92031 3 6.75 3H20.25C21.0797 3 21.75 3.67031 21.75 4.5V13.5C21.75 14.3297 21.0797 15 20.25 15H6.75C5.92031 15 5.25 14.3297 5.25 13.5V4.5Z"
                                    fill="black" />
                            </svg>

                            <span class="text-black text-xl">Voucher</span>
                        </a>
                    </li>
                    <li>
                        <a href="../php/Analytics.php"
                            class="flex items-center space-x-3 hover:bg-gray-300 p-2 rounded">

                            <svg width="25" height="25" viewBox="0 0 24 21" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
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
                    <h1 class="text-2xl font-semibold text-black">Dashboard</h1>
                    <div class="flex items-center space-x-2">
                       <img src="../images/ceclogo.png" alt="CEC Logo" class="w-10 h-10 objection-contain">
                        <span class="text-xl text-gray-800">Admin</span>
                    </div>
                </div>

                <!-- Cards Row -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <!-- Active User Card -->
                    <div class="bg-white p-6 rounded-lg shadow-lg flex items-center space-x-4">
                        <div>

                            <svg width="40" height="40" viewBox="0 0 50 50" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M25 0C29.4844 0 33.125 5.02155 33.125 11.2069C33.125 17.3922 29.4844 22.4138 25 22.4138C20.5156 22.4138 16.875 17.3922 16.875 11.2069C16.875 5.02155 20.5156 0 25 0ZM7.5 7.75862C10.6094 7.75862 13.125 11.2284 13.125 15.5172C13.125 19.806 10.6094 23.2759 7.5 23.2759C4.39062 23.2759 1.875 19.806 1.875 15.5172C1.875 11.2284 4.39062 7.75862 7.5 7.75862ZM0 43.1034C0 35.4849 4.47656 29.3103 10 29.3103C11 29.3103 11.9688 29.5151 12.8828 29.8922C10.3125 33.8578 8.75 39.0948 8.75 44.8276V46.5517C8.75 47.7802 8.9375 48.944 9.27344 50H2.5C1.11719 50 0 48.4591 0 46.5517V43.1034ZM40.7266 50C41.0625 48.944 41.25 47.7802 41.25 46.5517V44.8276C41.25 39.0948 39.6875 33.8578 37.1172 29.8922C38.0312 29.5151 39 29.3103 40 29.3103C45.5234 29.3103 50 35.4849 50 43.1034V46.5517C50 48.4591 48.8828 50 47.5 50H40.7266ZM36.875 15.5172C36.875 11.2284 39.3906 7.75862 42.5 7.75862C45.6094 7.75862 48.125 11.2284 48.125 15.5172C48.125 19.806 45.6094 23.2759 42.5 23.2759C39.3906 23.2759 36.875 19.806 36.875 15.5172ZM12.5 44.8276C12.5 35.3017 18.0938 27.5862 25 27.5862C31.9062 27.5862 37.5 35.3017 37.5 44.8276V46.5517C37.5 48.4591 36.3828 50 35 50H15C13.6172 50 12.5 48.4591 12.5 46.5517V44.8276Z"
                                    fill="#7082F8" />
                            </svg>

                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">1,500</h3>
                            <p class="text-sm text-gray-500">Active Users</p>
                        </div>
                    </div>

                    <!-- Total Voucher Card -->
                    <div class="bg-white p-6 rounded-lg shadow-lg flex items-center space-x-4">
                        <div>
                            <svg width="40" height="40" viewBox="0 0 50 50" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.55556 0C2.49132 0 0 3.73698 0 8.33333V16.6667C0 17.8125 0.642361 18.7109 1.36285 19.0885C2.99479 19.9349 4.16667 22.2656 4.16667 25C4.16667 27.7344 2.99479 30.0651 1.36285 30.9115C0.642361 31.2891 0 32.1875 0 33.3333V41.6667C0 46.263 2.49132 50 5.55556 50H44.4444C47.5087 50 50 46.263 50 41.6667V33.3333C50 32.1875 49.3576 31.2891 48.6371 30.9115C47.0052 30.0651 45.8333 27.7344 45.8333 25C45.8333 22.2656 47.0052 19.9349 48.6371 19.0885C49.3576 18.7109 50 17.8125 50 16.6667V8.33333C50 3.73698 47.5087 0 44.4444 0H5.55556ZM36.1111 35.4167V14.5833H13.8889V35.4167H36.1111ZM9.72222 12.5C9.72222 10.1953 10.9635 8.33333 12.5 8.33333H37.5C39.0365 8.33333 40.2778 10.1953 40.2778 12.5V37.5C40.2778 39.8047 39.0365 41.6667 37.5 41.6667H12.5C10.9635 41.6667 9.72222 39.8047 9.72222 37.5V12.5Z"
                                    fill="#7082F8" />
                            </svg>

                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">2,500</h3>
                            <p class="text-sm text-gray-500">Total Vouchers</p>
                        </div>
                    </div>

                    <!-- Data Usage Card -->
                    <div class="bg-white p-6 rounded-lg shadow-lg flex items-center space-x-4">
                        <div>

                            <svg width="40" height="40" viewBox="0 0 50 50" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.1579 30.5774V10.4987H21.0526V30.5774L17.1053 26.9029L13.1579 30.5774ZM26.3158 34.5144V0H34.2105V26.6404L26.3158 34.5144ZM0 43.5696V20.9974H7.89474V35.6955L0 43.5696ZM0 50L16.9737 33.0709L26.3158 41.0761L41.0526 26.378H36.8421V21.1286H50V34.252H44.7368V30.0525L26.5789 48.1627L17.2368 40.1575L7.36842 50H0Z"
                                    fill="#7082F8" />
                            </svg>

                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">100 GB</h3>
                            <p class="text-sm text-gray-500">Data Usage</p>
                        </div>
                    </div>

                    <!-- Connection Time Card -->
                    <div class="bg-white p-6 rounded-lg shadow-lg flex items-center space-x-4">
                        <div>
                            <i class="fas fa-clock text-yellow-500 text-3xl"></i>
                            <svg width="40" height="40" viewBox="0 0 50 50" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M25 0C38.8086 0 50 11.1914 50 25C50 38.8086 38.8086 50 25 50C11.1914 50 0 38.8086 0 25C0 11.1914 11.1914 0 25 0ZM22.6562 11.7188V25C22.6562 25.7812 23.0469 26.5137 23.7012 26.9531L33.0762 33.2031C34.1504 33.9258 35.6055 33.6328 36.3281 32.5488C37.0508 31.4648 36.7578 30.0195 35.6738 29.2969L27.3438 23.75V11.7188C27.3438 10.4199 26.2988 9.375 25 9.375C23.7012 9.375 22.6562 10.4199 22.6562 11.7188Z"
                                    fill="#7082F8" />
                            </svg>

                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">8,000 h</h3>
                            <p class="text-sm text-gray-500">Connection Time</p>
                        </div>
                    </div>
                </div>

               <!-- Charts Section -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
  <!-- User Connections -->
  <div class="bg-white p-6 rounded-lg shadow-lg h-[350px] flex flex-col">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">User Connections</h2>
    <div class="flex-1">
      <canvas id="userConnectionsChart" class="w-full h-full"></canvas>
    </div>
  </div>

  <!-- User Role Breakdown -->
  <div class="bg-white p-6 rounded-lg shadow-lg h-[350px] flex flex-col">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">User Role Breakdown</h2>
    <div class="flex-1">
      <canvas id="userRoleChart" class="w-full h-full"></canvas>
    </div>
  </div>
</div>
            </div>
        </div>

        <script>
  // User Connections (Bar Chart)
  const ctx1 = document.getElementById('userConnectionsChart');
  new Chart(ctx1, {
    type: 'bar',
    data: {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      datasets: [{
        label: 'Active Connections',
        data: [120, 200, 180, 250, 300, 150, 100],
        backgroundColor: '#7082F8',
        borderRadius: 6
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        y: { beginAtZero: true, ticks: { stepSize: 50 } }
      }
    }
  });

</script>

    </body>

</html>