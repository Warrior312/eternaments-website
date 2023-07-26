<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
if(isset($_SESSION['userData'])){
    extract($_SESSION['userData']);
}


if (isset($_POST["compsign"])){

    $userName = $_POST["userName"];

    $pwd = $_POST["passWord"];

    $pwdRepeat = $_POST["passWordRep"];

    echo "Starting";
    require_once 'dbh.inc.php';

    require_once 'functions.inc.php';
    echo "Checking Inputs";
    echo $pwd . "\n";
    echo $userName . "\n";
    echo $pwdRepeat;
    if (emptyInputSignup($userName, $pwd, $pwdRepeat) !== false){
        
        header("location: /pages/signup.php?error=emptyinput");
        exit();
    }
    
    if (pwdMatch($pwd, $pwdRepeat) !== false){
        
        header("location: /pages/signup.php?error=passnomatch");
        exit();
    }
    

    if (strlen($pwd) < 8 || strlen($pwd) > 16) {
        $error = "Password should be min 8 characters and max 16 characters";
    }
    if (!preg_match("/\d/", $pwd)) {
        $error = "Password should contain at least one digit";
    }
    if (!preg_match("/[A-Z]/", $pwd)) {
        $error = "Password should contain at least one Capital Letter";
    }
    if (!preg_match("/[a-z]/", $pwd)) {
        $error = "Password should contain at least one lowercase Letter";
    }
    if (!preg_match("/\W/", $pwd)) {
        $error = "Password should contain at least one special character";
    }
    if (preg_match("/\s/", $pwd)) {
        $error = "Password should not contain any spaces.";
    }
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    
    if ($error !== null){
        $_SESSION["passError"] = $error;
        header("location: /pages/signup.php?error=passinval");
        exit();
    }
    
    
    if (uidExists($conn, $userName) !== false){
        
        header("location: /pages/signup.php?error=invaliduser");
        exit();
    }
    echo "Passed Checks";
    createUser($conn, $userName, $pwd);
    echo "Created User";
    exit();
    
}


if (isset($_POST["login"])){
    require_once 'dbh.inc.php';
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    $sql = "SELECT * FROM users WHERE usersName = ?";
    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)){
        header("location: /pages/signup.php?error=stmtfailed");
        exit();
    }

    
    $userName = $_POST["userName"];
    mysqli_stmt_bind_param($statement, "s", $userName);
    mysqli_stmt_execute($statement);
    $resultData = mysqli_stmt_get_result($statement);

   
    
    if($row = mysqli_fetch_assoc($resultData)){
        if (password_verify( $_POST["passWord"], $row["usersPwd"]) == true){
            $_SESSION['userData'] = [
                'name'=>$row["usersName"],
                'discordId'=>$row["usersDiscordId"],
                'avatar'=>$row["avatar"],
            ];
            $_SESSION['logged_in'] = true;
            
                
            
            
           
            mysqli_stmt_close($statement);
            header("location: /pages/account.php");
            exit();
        }else{
            $res = password_verify( $_POST["passWord"], $row["usersPwd"]);
            print_r($res == true);
            print_r("Printed Result");
            //header("location: /pages/signup.php?error=invalLogin");
           
        }
    }else{
        header("location: /pages/signup.php?error=usernoexist");
        exit(); 
    }
    
   
    
}
