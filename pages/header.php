<?php
    error_reporting(0);
    if (!isset($_SESSION)) {
        session_start();
    }

    if (!$_SESSION['logged_in']) {
        //do nothing
    } else {
        extract($_SESSION['userData']);
        $avatar_url = "https://cdn.discordapp.com/avatars/$discordId/$avatar.jpg";
    }
    error_reporting(0);
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../styles/nav.css">
</head>

<body>

    <div id="topnav">
        <a class="active" href="/index.php">Home</a>

        <!---
        <div class="dropdown">
            <a class="dropbtn">Leagues</a>
            <div class="dropdownContent">
                
                <a href="#dropdown">More Dropdown Content</a>
                <a href="#dropdown">More Dropdown Content</a>
                <a href="#dropdown">More Dropdown Content</a>
                <a href="#dropdown">More Dropdown Content</a>
            </div>
        </div>
        -->

        <a href="/pages/staff.php">Contact</a>
        <a href="/pages/comingsoon.php">Account</a>
        <a href="/pages/hall0fame.php">Honors</a>

        <!---
        <img src=<?php
        /*
        error_reporting(0);
        if($_SESSION['logged_in']){
            echo $avatar_url;
        }else{
            echo 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/46/Question_mark_%28black%29.svg/800px-Question_mark_%28black%29.svg.png';
        } */?> id="avatar">
        --->

    </div>
</body>

</html>