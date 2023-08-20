<?php
error_reporting(E_ALL);
$serverName = "localhost:3306";
$dBUsername = "eternao4_admin";
$dBPassword = "vKZcHnMDbkC2ZIBO "; //vKZcHnMDbkC2ZIBO 
$dBName = "eternao4_website_data";




$conn = mysqli_connect($serverName, $dBUsername, $dBPassword);

mysqli_select_db($conn, $dBName);


if (!$conn){
    $_SESSION["connErr"] = mysqli_connect_error;
    print_r("Connection Failed: " . mysqli_connect_error);
    die("Connection Failed: " . mysqli_connect_error);
};