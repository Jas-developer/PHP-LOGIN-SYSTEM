<?php 

declare(strict_types = 1);



// check if the username is empty
function is_input_empty(string $username, string $pwd)
{
    if(empty($username) || empty($pwd)){
       return true;
    }else{
       return false;
    };
}


// check if the username exist in db 
// and if the password matches
function is_username_wrong(bool|array $result)
{
   if(!result){
     return true;
   }else{
    return false;
   }
}


// check if the password is wrong 
function is_password_wrong(string $pwd, string $hashedPwd)
{
   if(password_verify($pwd, $hashedPwd)){
     return false;
   }
   else{
     return true;
   }
}