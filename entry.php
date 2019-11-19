<?php 
  require 'config/config.php';
  $error_array = array(); //Holds error messages
  require 'includes/handlers/register_handler.php';
  require 'includes/handlers/login_handler.php';

?>

<!DOCTYPE html>
<head>
  <link rel="stylesheet" type="text/css" href="style/entry.css">
  <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poiret+One&display=swap" rel="stylesheet">

  <title>Party Thyme</title>
  <link rel="icon" type="image/gif/png" href="images/logo.png">

</head>
<html>
  <body>
    <div class="center vertical-center entry-box">
      <div class="title">
        Party Thyme
      </div>
      <hr>
      <div class="options">
        <button type="button" name="button" onclick="showLogin()">Log In</button>
        <img src="images/logo.png" alt="">
        <button type="button" name="button" onclick="showRegister()">Register</button>
      </div>
      <hr>
      <div class="login hidden" id="login-section">
        <form action="entry.php#loginForm" method="POST" id="loginForm">
        	<input class="form-input" type="text" name="log_uname" placeholder="username"  required> <br>
        	<input class="form-input" type="password" name="log_password" placeholder="password"  required> <br>
        	<input class="submit-button" type="submit" name="log_button" placeholder="Register"  required>
        </form>

        
      </div>
      <div class="register hidden" id="register-section" >
        <form action="entry.php#registerForm" method="POST" id="registerForm">
        	<input class="form-input" type="text" name="reg_uname" placeholder="username"  required> <br>
        	<input class="form-input" type="password" name="reg_password" placeholder="password"  required> <br>
          <input class="form-input" type="password" name="reg_password_confirm" placeholder="confirm password"  required> <br>
        	<input class="submit-button" type="submit" name="reg_button" placeholder="Register"  required>
        </form>

       

      </div>
       <?php if(in_array("Username not found <br>", $error_array)) echo "<div style ='font:20px/21px Arial,tahoma,sans-serif;color:#ff0000'>Username not found <br><br><br></div>";  

         if(in_array("Password incorrect <br>", $error_array)) echo "<div style ='font:20px/21px Arial,tahoma,sans-serif;color:#ff0000'>Password incorrect<br><br><br></div>";  

          if(in_array("Passwords don't match <br>", $error_array)) echo "<div style ='font:20px/21px Arial,tahoma,sans-serif;color:#ff0000'>Passwords don't match<br><br></div>";  

        if(in_array("Username already in use<br>", $error_array)) echo "<div style ='font:20px/21px Arial,tahoma,sans-serif;color:#ff0000'>Username already in use<br><br><br></div>";  ?>

    </div>

  </body>

  <script>
    function showLogin() {
      document.getElementById("login-section").classList.remove("hidden");
      document.getElementById("register-section").classList.remove("showing-register");
      document.getElementById("login-section").classList.add("showing-login");
      document.getElementById("register-section").classList.add("hidden");
    }
    function showRegister() {
      document.getElementById("register-section").classList.remove("hidden");
      document.getElementById("login-section").classList.remove("showing-login");
      document.getElementById("register-section").classList.add("showing-register");
      document.getElementById("login-section").classList.add("hidden");
    }
  </script>
</html>
