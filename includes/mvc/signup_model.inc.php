<?php 

declare(strict_types=1);

function get_username(object $pdo ,string $username){
    $query = "SELECT username from users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}



function get_email(object $pdo, string $email){

    $query = "SELECT email FROM users WHERE email = :email;"; //query 
    $stmt = $pdo->prepare($query); //prepare
    $stmt->bindParam(":email",$email);//bind 
    $stmt->execute(); //execute
    // get the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result; // return the result from using this function

}

// create a new user

function set_user(object $pdo, string $username, string $pwd, string $email){
         $query = "INSERT INTO users (username, pwd, email) VALUES(:username,
         :pwd, :email);";

         $options = [
            'cost' => 12
         ];

         $hashedPassword = password_hash($pwd, PASSWORD_BCRYPT, $options);

         $stmt = $pdo->prepare($query);
         $stmt->bindParam(":username", $username);
         $stmt->bindParam(":pwd", $hashedPassword);
         $stmt->bindParam(":email", $email);
         $stmt->execute();
         
}
