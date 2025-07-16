<?


if($_SERVER["REQUEST_METHOD"] === "POST"){
 
    $username = isset($_POST["username"]) ? $_POST["username"] : " ";
    $pwd = isset($_POST["pwd"]) ? $_POST["pwd"] : " ";

    try{

        require_once("dbh.inc.php"); //connection from db
        require_once("./mvc/login_model.inc.php") //will controll/modify db
        require_once("./mvc/login_controller.inc.php") // will handle the logic

        //error handler
        $errors = [];


        // checking if the error is empty
        if(is_input_empty($username, $pwd)){
            $errors["empty_input"] = "Fill in all fields";
        }
        
        //grab the user from our model 
        $result = get_user($pdo, $username);

        //check if the username is wrong by just checking if the result is empty/not
        if(is_username_wrong($result)){
            errors["login_incorrect"] = "Incorrect login info";
        };

        //check if the password is wrong/not similar
        if(!is_username_wrong($result) && !is_password_wrong($pwd, $result["pwd"])){
           errors["login_incorrect"] = "Incorrect login info";
        };

        require_once "config_session.inc.php";

        if($errors){
           $_SESSION["errors_login"] = $errors;
           header("Location:../index.php");
           die();
        };

        $newSessionId = session_create_id();
        $sessionId = $newSessionId."_".$result["id"];
        session_id($sessionId);


        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_username"] = htmlspecialchars($result["username"]);

        
    }catch(PDOException $e){
       die("Query Failed":.$e->getMessage());
    }

   

} else {
    header("Location:../index.php")
    die();
}



