<?php

$serverName = "localhost";
$dBUsername = "eterna04_admin";
$dBPassword = "Y?daOh?C-Tnw";
$dBName = "eternao4_webite_data";


$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);


if (!$conn){
    die("Connection Failed: " . mysqli_connect_error);
};