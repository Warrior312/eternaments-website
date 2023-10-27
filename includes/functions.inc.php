<?php

function emptyInputSignup($username, $pwd, $pwdRepeat)
{
    $result = false;
    if (empty($username) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    }
    return $result;
}

function invalidUid($username)
{
    $result = false;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username) or !strlen($username) > 5 or !strlen($username) < 15) {
        $result = true;
    }
    return $result;
}

function pwdLength($pwd)
{
    $result = false;
    if (strlen($pwd) < 8 || strlen($pwd) > 16) {
        $result = true;
    }
    return $result;
}
function pwdMatch($pwd, $pwdRepeat)
{
    $result = false;
    if ($pwd !== $pwdRepeat) {
        $result = true;
    }
    return $result;
}

function uidExists($conn, $username)
{
    $sql = "SELECT * FROM users WHERE usersName = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /pages/signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        mysqli_stmt_close($stmt);
        return $row;
    } else {
        mysqli_stmt_close($stmt);
        $result = false;
        return $result;
    }
}



function createUser($conn, $userName, $pwd)
{
    print_r("Creating User");
    $sql = "INSERT INTO users (usersName, usersPwd, usersDiscordId, avatar) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /pages/signup.php?error=stmtfailed");
        exit();
    }

    if (!isset($_SESSION)) {
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

?>