<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CEC Navigation</title>
  <script src="css/tailwind.css"></script>
<body class="bg-gray-50 scroll-smooth">

  <!-- main nav ni -->
  <nav class="w-full max-w-[1920px] mx-auto p-5 bg-white border-b border-gray-300 shadow-md px-6 sm:px-10 md:px- sticky top-0 transition-all duration-300 ease-in-out z-10">
    <div class="flex items-center justify-between h-[80px] sm:h-[100px] md:h-[130%] whitespace-nowrap">
      <!-- Left side ni sa nav -->
      <div class="flex items-center space-x-3">
      <a href="Privacy.php"> <img src="images/ceclogo.png" alt="CEC Logo" class="w-[50x] h-[50px] object-contain"></a>
        <span class="text-[18px] sm:text-[20px] md:text-[22px] italic font-medium text-blue-900">
         <a href="Privacy.php"> 宿务东学院</a>
        </span>
      </div>

      <!-- Right side (desktop links) -->
      <div id="menuLinks" class="hidden sm:flex items-center space-x-0 text-gray-700 text-[14px] sm:text-[15px] md:text-[16px]">
        <a href="#info" class="px-4 py-2 rounded-lg transition hover:bg-[#A9ADD3] hover:text-black">Colleges</a>
        <a href="#cont" class="px-4 py-2 rounded-lg transition hover:bg-[#A9ADD3] hover:text-black">About Us</a>
      </div>

      <!-- Mobile button -->
      <button id="menuBtn" class="sm:hidden text-gray-700 text-2xl">☰</button>
    </div>

    <!-- Mobile dropdown -->
    <div id="mobileMenu" class="hidden flex-col sm:hidden border-t border-gray-200 bg-white text-gray-700 text-base">
      <a href="#info" class="block px-6 py-3 hover:bg-gray-100">Colleges</a>
      <a href="#cont" class="block px-6 py-3 hover:bg-gray-100">About Us</a>
    </div>
  </nav>
    

    <section>

    </section>



  <script>
    // Get button and menu
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    // Toggle show/hide
    menuBtn.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });


</body>
</html>
