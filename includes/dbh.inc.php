<?php

$serverName = "localhost:3306";
$dBUsername = "eternao4_admin";
$dBPassword = "vKZcHnMDbkC2ZIBO"; //vKZcHnMDbkC2ZIBO 
$dBName = "eternao4_website_data";




$conn = mysqli_connect($serverName, $dBUsername);

mysqli_select_db($conn, "eternao4_website_data");


if (!$conn){
    die("Connection Failed: " . mysqli_connect_error);
};