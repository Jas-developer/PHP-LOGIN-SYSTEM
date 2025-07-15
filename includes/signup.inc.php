<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){
   $username = $_POST["username"];
   $pwd = $_POST["pwd"];
   $email = $_POST["email"];
   
   try{
      require_once("dbh.inc.php");
      require_once("./mvc/signup_model.inc.php");
      require_once("./mvc/signup_controller.inc.php");


      // ERROR HANDLER
      $errors = [];
      

      if(is_input_empty($username,$pwd,$email)){
         $errors["empty_input"] = "Fill in all Fields!";
      }

      if(is_email_invalid($email)){
          $errors["invalid_email"] = "Invalid email used!";
      }

      if(is_username_taken($pdo, $username)){
          $errors["username_taken"] = "username is already taken!";
      }


      if(is_email_registered($pdo,$email)){
          $errors["email_used"]  = "email is already registerded";
      }
 
  
     require_once 'config_session.inc.php';
  
     
      if($errors){
         $_SESSION["errors_signup"] = $errors;
         header("location:../index.php");
         die();
      };

      // no error
      // create a user 
      create_user($pdo, $username, $pwd, $email);  // function from controller
      header("location:../index.php?signup=success");
      
      $pdo = null;
      $pdo = null;

   }catch(PDOException $e){
      die("Query failed: ".$e->getMessage());
   }

}else{
   header("location:../index.php");
   die();
}