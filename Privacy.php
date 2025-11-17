<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CEC Navigation</title>
  <script src="css/tailwind.css"></script>
 
</head>
<body class="bg-gray-50 scroll-smooth"> 

 <!-- main nav ni  -->
  <nav class="w-full max-w-[1920px] mx-auto p-5  bg-white border-b border-gray-300 shadow-md px-6 sm:px-10 md:px- sticky top-0 transition-all duration-300 ease-in-out">
    <div class="flex items-center justify-between h-[80px] sm:h-[100px] md:h-[130%] whitespace-nowrap">
      
      <!-- Left side ni sa nav -->
      <div class="flex items-center space-x-3">
      <img src="images/ceclogo.png" alt="CEC Logo" class="w-[50x] h-[50px] object-contain">
        <span class="text-[18px] sm:text-[20px] md:text-[22px] italic font-medium text-blue-900">
          Cebu Eastern College Office
        </span>
      </div>

      <!-- Right side (desktop links) -->
      <div id="menuLinks" class="hidden sm:flex items-center space-x-0 text-gray-700 text-[14px] sm:text-[15px] md:text-[16px]">
        <a href="#info" class= "px-4 py-2 rounded-lg transition hover:bg-[#A9ADD3] hover:text-black">Information</a>
        <a href="#cont" class="px-4 py-2 rounded-lg transition hover:bg-[#A9ADD3] hover:text-black">Contact Us</a>
      </div>

      <!-- Mobile button -->
      <button id="menuBtn" class="sm:hidden text-gray-700 text-2xl">☰</button>
    </div>

    <!-- Mobile dropdown -->
    <div id="mobileMenu" class="hidden flex-col sm:hidden border-t border-gray-200 bg-white text-gray-700 text-base">
      <a href="#info" class="block px-6 py-3 hover:bg-gray-100">Information</a>
      <a href="#cont" class="block px-6 py-3 hover:bg-gray-100">Contact Us</a>
    </div>
  </nav>

  <section class="sm:mx-[]">
     <p class=" ml-20 mr-20 mt-10 font-bold khula text-2xl text-blacke-900">Privacy Notice</p>
     <p class=" mt-20 ml-20 mr-20 font-semibold">CEBU EASTERN COLLEGE PRIVACY NOTICE (REVISE AS OF THE 1st SEMESTER/2nd SEMESTER 2024-2025)</p>
     <p class=" ml-20 mr-20 mt-10 font-bold khula text-x1 text-black-900">POLICY</p>
     <p class="ml-20 mr-20 mt-5 khula text-x1 text-blacke-900">
        To exercise and safeguard academic freedom and uphold your right to quality education, the Cebu Eastern College (CEC)  needs to process your personal and sensitive personal information (personal data) 
        – that is, information that identifies you as an individual.
     </p>
      <p class="text-black-700 ml-20"> 
  CEC is committed to comply with the 
  <a href="https://www.officialgazette.gov.ph/2012/08/15/republic-act-no-10173/"
     class="text-blue-700 hover:text-blue-900 underline decoration-solid decoration-2 underline-offset-2 decoration-from-font transition">
     Philippine Data Privacy Act of 2012 (DPA)
  </a>
  in order to protect your right to data privacy. 
</p>

  <p class="mt-20 ml-20 text-black-900 font-semibold" >
    This Privacy notice explain in general terms:
  </p>
    
    <p class="mt-10 ml-20 text-black-900" >1.The nature, purpose/(s)  and extent of the processing of  your personal data;</p>
    <p class=" ml-20 text-black-900" >2.the legal basis/(es) for such processing; </p>
    <p class=" ml-20 text-black-900" >3.the risks associated with such processing and the measures that UP has put in place to protect your data privacy; and </p>
    <p class=" ml-20 text-black-900" >4.your data privacy rights and how you may exercise the same.</p>


  
    <p class=" mr-20 mt-10 ml-20 text-black-900" >
      We reserve the right to amend this Privacy Notice at any time to reflect changes in our practices or for other operational, legal, or regulatory reasons. Any updates will be posted on this page, and the effective date will be revised accordingly. We encourage you to review this Privacy Notice periodically to stay informed about how we protect your personal data.
    </p>
</section>

    <section  id="info">
    <p class=" mt-10 ml-20 mr-20 text-black-900 font-bold  text-2xl" >Information</p>
     <p class="mt-10 ml-20 mr-20 text-black-900" >
      The Web-Based Wi-Fi Hotspot User Authentication and Access Control System was created specifically for Cebu Eastern College (CEC) to improve and secure the school’s internet connectivity management. The institution faced recurring issues such as unauthorized access, slow network performance due to uncontrolled usage, and the lack of a proper system to identify and manage users connecting to the school Wi-Fi. 
      These problems often caused inconvenience for students, teachers, and staff who relied on stable internet access for learning and administrative purposes.
     </p>
     <p class="mt-10 ml-20 mr-20 text-black-900" >
      To address these challenges, the system was designed to automate user access, improve network control, and strengthen data security within the campus. It introduces a voucher-based login system, where administrators can issue unique access credentials to each student or staff member.
       This ensures that only authorized users can connect to the Wi-Fi network, while also allowing administrators to monitor user sessions, bandwidth usage, and connection duration in real time.
      </p>
      <p class="mt-10 ml-20 mr-20 text-black-900" >
      The creation of this system reflects CEC’s commitment to modernizing its technological infrastructure and promoting a more efficient, secure, and organized digital environment for both academic and administrative operations. 
      By implementing this solution, the school can maximize its network resources, maintain fair access for all users, and support digital learning in a controlled and reliable manner.
      </p>
  </section>

  <section class="bg-gray-100 flex mt-10" id="cont">
    <div>
    <p class=" py-10 ml-20 font-bold khula text-black-900 text-2xl ">Find Us</p>
    <p class="ml-20 khula text-black-900 font-semibold ">Address</p>
    <p class=" mt-5 ml-20 khula text-black-900 italic">Cebu Eastern College Incorporation </p>
    <p class="ml-20 khula text-black-900 italic"> Leon Kilat ST., Cebu City</p>
    <p class="ml-20 khula text-black-900 italic"> 6000 Cebu Philippines</p>
    <p class="mt-5 ml-20 font-bold khula text-black-900 ">Hours</p>
    <p class="ml-20 khula text-black-900 italic">Monday-Friday: 8:100AM -5:00PM</p>
    <p class="mt-5 ml-20 font-bold khula text-black-900 ">Contact</p>
    <p class="ml-20 khula text-black-900 italic">+63 917 123 4567</p>

    <!-- ICON SVG  -->
    <a href="#" class="inline-block">
  <svg
    xmlns="http://www.w3.org/2000/svg"
    viewBox="0 0 50 53"
    class=" mt-10 ml-20 w-7 h-7 text-blue-700 fill-current"
  >
    <g clip-path="url(#clip0_406_99)">
      <path
        d="M50 26.2705C50 11.7602 38.8086 0 25 0C11.1914 0 0 11.7602 0 26.2705C0 38.5849 8.07617 48.9289 18.9648 51.7714V34.2954H13.8086V26.2705H18.9648V22.8123C18.9648 13.8741 22.8125 9.72831 31.1719 9.72831C32.7539 9.72831 35.4883 10.0567 36.6113 10.3851V17.6505C36.0254 17.589 35 17.5479 33.7207 17.5479C29.6191 17.5479 28.0371 19.1796 28.0371 23.4177V26.2705H36.2012L34.7949 34.2954H28.0273V52.3461C40.4102 50.776 50 39.7034 50 26.2705Z"
      />
    </g>
    <defs>
      <clipPath id="clip0_406_99">
        <rect width="50" height="53" fill="white" />
      </clipPath>
    </defs>
  </svg>
</a>

<a href="#" class="inline-block">
  <svg
    xmlns="http://www.w3.org/2000/svg"
    viewBox="0 0 50 53"
    class="mt-10 ml-5 w-7 h-7 text-black-700 fill-current"
  >
    <path
      d="M49.9888 21.4632C45.0793 21.4734 40.2813 20.0725 36.2867 17.4548V35.7277C36.2867 39.1123 35.1597 42.4151 33.0508 45.1965C30.9419 47.9778 27.9627 50.1047 24.5037 51.2908C21.0447 52.477 17.2732 52.6713 13.6915 51.8328C10.1097 50.9943 6.89616 49.1844 4.46369 46.6383C2.03122 44.0921 0.524868 40.912 0.112017 37.5478C-0.300833 34.1837 0.435603 30.7888 2.18743 27.8132C3.93925 24.8376 6.65068 22.4244 9.95348 20.8906C13.2563 19.3568 16.9719 18.7944 20.6318 19.2545V28.4472C18.9581 27.9666 17.1616 27.9768 15.4991 28.4881C13.8365 28.9994 12.386 29.981 11.3706 31.2796C10.3552 32.5783 9.80843 34.153 9.81959 35.7686C9.83075 37.3842 10.3998 38.9385 11.4375 40.2371C12.4752 41.5358 13.9369 42.4969 15.6107 42.9878C17.2844 43.4786 19.0808 43.4786 20.7434 42.9775C22.406 42.4765 23.8677 41.5051 24.8942 40.2064C25.9208 38.9078 26.4787 37.3331 26.4787 35.7277V0H36.2978C36.2867 0.756683 36.3648 1.52359 36.5098 2.27005C36.8557 3.9368 37.5587 5.53196 38.5964 6.94308C39.6341 8.35419 40.9731 9.56079 42.5241 10.4811C44.7445 11.8206 47.3444 12.5364 50 12.5364V21.4734L49.9888 21.4632Z"
    />
  </svg>
</a>

<a href="#" class="inline-block">
  <svg
    xmlns="http://www.w3.org/2000/svg"
    viewBox="0 0 50 53"
    class="mt-10 ml-5 w-7 h-7 text-red-700 fill-current"
  >
    <path
      d="M4.6875 0C2.09961 0 0 2.93084 0 6.54326C0 8.60167 0.693359 10.5374 1.875 11.7779L22.1875 33.0435C23.8574 34.7884 26.1426 34.7884 27.8125 33.0435L48.125 11.7779C49.3066 10.5374 50 8.60167 50 6.54326C50 2.93084 47.9004 0 45.3125 0H4.6875ZM0 17.994V43.6218C0 48.4338 2.80273 52.3461 6.25 52.3461H43.75C47.1973 52.3461 50 48.4338 50 43.6218V17.994L30.625 38.2781C27.2949 41.7678 22.7051 41.7678 19.375 38.2781L0 17.994Z"
    />
  </svg>
</a>
<!--  -->
</div>


<!-- Left side -->
<div>

  </section>

<footer class="border-t-2 border-b-2 border-black-500 text-center py-4">
  <p class="text-blue-600">&copy; 2025 Cebu Eastern College. All Rights Reserved.</p>
</footer>


  <script>
    // Get button and menu
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    // Toggle show/hide
    menuBtn.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });
  </script>

</body>
</html>











