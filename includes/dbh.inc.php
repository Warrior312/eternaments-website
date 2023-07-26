<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = " "; //vKZcHnMDbkC2ZIBO 
$dBName = "website_data";


$conn = mysqli_connect($serverName, $dBUsername);

mysqli_select_db($conn, "website_data");


if (!$conn){
    die("Connection Failed: " . mysqli_connect_error);
};