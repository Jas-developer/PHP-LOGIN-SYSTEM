<?php 

declare(strict_types=1);


function signup_inputs()
{
//  for username
  if(isset($_SESSION["signup_data"]["username"]) && 
     !isset($_SESSION["errors_signup"]["username_taken"])){
     echo ' <input type="text" name="username" placeholder="Enter your username" value="'.$_SESSION["signup_data"]["username"].'" >';
     }else {
     echo ' <input type="text" name="username" placeholder="Enter your username">';
     } 
     echo '<input type="password" name="pwd" placeholder="Enter your password">';
  
   // for email
   if(isset($_SESSION["signup_data"]["emai"]) && 
     !isset($_SESSION["errors_signup"]["email_used"]) &&
     !isset($_SESSION["errors_signup"]["invalid_email"])
     ){
     echo ' <input type="text" name="email" placeholder="Enter your email" value="'.$_SESSION["signup_data"]["email"].'" >';
     }else {
     echo ' <input type="text" name="email" placeholder="Enter your email">';
     }
}

function check_signup_errors(){
    if(isset($_SESSION['errors_signup'])){
       $errors = $_SESSION["errors_signup"];
       echo "<br>";
       foreach($errors as $error){
          echo '<p class="form-error">'.$error. '</p>';
       }
       unset($_SESSION["errors_signup"]);
    } else if (isset($_GET["signup"]) &&  $_GET["signup"] === "success"){
      echo "YOu are loggin";
    }
};