<?php
    error_reporting(0);
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    
    if(!$_SESSION['logged_in']){
        //do nothing
    }else{
       
        extract($_SESSION['userData']);
        $avatar_url = "https://cdn.discordapp.com/avatars/$discordId/$avatar.jpg";
    }
    
    
    
    
    
   
    
    error_reporting(0);
?>
<html>


<div id="topnav">
    <link rel="stylesheet" href="/pages/nav.css">
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
   
    <a href="/pages/signup.php">Account</a>

    <a href="/pages/hall0Fame.php">Honors</a>


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
</html>