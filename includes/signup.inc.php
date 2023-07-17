<?php
session_start();

extract($_SESSION['userData']);

if (!$_SESSION['logged_in']){
    header('Location : /index.php');
    exit();
}
$avatar_url = "https://cdn.discordapp.com/avatars/$discord_id/$avatar.jpg";
