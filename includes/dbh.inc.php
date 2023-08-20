<?php

$serverName = "localhost";
$dBUsername = "eternao4_admin";
$dBPassword = "vKZcHnMDbkC2ZIBO "; //vKZcHnMDbkC2ZIBO 
$dBName = "eternao4_website_data";




$conn = mysqli_connect($serverName, $dBUsername);

mysqli_select_db($conn, $dBName);


if (!$conn){
    $_SESSION["connErr"] = mysqli_connect_error;
    print_r("Connection Failed: " . mysqli_connect_error);
    die("Connection Failed: " . mysqli_connect_error);
};