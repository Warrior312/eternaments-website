<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = ""; //vKZcHnMDbkC2ZIBO 
$dBName = "eternao4_website_data";




$conn = mysqli_connect($serverName, $dBUsername);

mysqli_select_db($conn, $dBName);


if (!$conn){
    echo "Connection Failed: " . mysqli_connect_error;
    die("Connection Failed: " . mysqli_connect_error);
};