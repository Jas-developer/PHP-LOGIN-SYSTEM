<?php 


declare(strict_types = 1);


// will get users in form of an array

function get_user(object $pdo, string $username)
{
    // query
    $query = "SELECT * FROM users WHERE  username = :username;";    
    //declare the statement and prep the query
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username",$username);
    $stmt->execute();

    // get the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
  
};