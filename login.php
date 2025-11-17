<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CEC WiFi Login</title>
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <div class="login-container">
    <div class="login-box">
      <!-- Logo -->
      <img src="images/ceclogo.png" alt="CEC Logo" class="logo">

      <!-- Login Form with Fieldset -->
      <form>
        <fieldset>
          <legend>CEC WiFi</legend>

          <input type="text" placeholder="Username" required>
          <input type="password" placeholder="Password" required>

          <label class="checkbox">
            <input type="checkbox" required>
            I acknowledge that I have read and understood the 
            data privacy policy of the college.
          </label>

          <label class="checkbox">
            <input type="checkbox" required>
            I acknowledge that I have read and understood the 
            acceptable use policy of the college.
          </label>

         <a href="./Privacy.php"> <button type="submit">Login</button></a>
        </fieldset>
      </form>

      <!-- Footer -->
      <p class="footer">Made with ♥ by <span>CEC IT Team</span></p>
    </div>
  </div>
</body>
</html>
