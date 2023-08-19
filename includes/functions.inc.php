<?php

function emptyInputSignup($username, $pwd, $pwdRepeat){
    $result;
    if (empty($username) || empty($pwd) || empty($pwdRepeat)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invalidUid($username){
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username) or !strlen($username) > 5 or !strlen($username) < 15){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}



function pwdLength($pwd){
    $result;
    if (strlen($pwd) < 8 || strlen($pwd) > 16){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
function pwdMatch($pwd, $pwdRepeat){
    $result;
    if ($pwd !== $pwdRepeat){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}



function uidExists($conn, $username){
    $sql = "SELECT * FROM users WHERE usersName = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: /pages/signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    
    if ($row = mysqli_fetch_assoc($resultData)) {
       return $row;
    }else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);

}



function createUser($conn, $userName, $pwd){
    print_r("Creating User");
    $sql = "INSERT INTO users (usersName, usersPwd, usersDiscordId, avatar) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: /pages/signup.php?error=stmtfailed");
        exit();
    }
    
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    
    
       
    extract($_SESSION['userData']);
    
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    print_r("Hashed");
    print_r($discordId);
    mysqli_stmt_bind_param($stmt, "ssss", $userName, $hashedPwd, $discordId, $avatar);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    $_SESSION['logged_in'] = true;
    header("location: /pages/account.php");
    exit();
}



