<?php  
require_once "./includes/mvc/signup_view.inc.php";
require_once "./includes/config_session.inc.php";

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
    <title> PHP LOGIN </title>
</head>
<body>
      <section class="main-container">
        <!-- THIS IS A LOGIN PORTAL -->
        <div class="login-container">
            <div class="form-container">
            <h1>Login System</h1>
              <form action="./includes/login.inc.php" method="post">
                  <input type="text" name="username" placeholder="Enter your username">
                  <input type="password" name="pwd" placeholder="Enter your password">
                  <button class="login-button" type="submit"> Login</button>
              </form>
        </div>
        </div>
   <hr>
         <div class="login-container">
            <div class="form-container">
            <h1>SignUp System</h1>
              <form action="./includes/signup.inc.php" method="post">
                  
                  <?php check_signup_errors(); ?>
              </form>

              
        </div>
         </div>
      </section>



</body>
</html>