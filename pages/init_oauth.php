<?php
session_start();

if($_SESSION['logged_in']){
    header("Location: account.php");
    exit();
}else{
    $discord_url = "https://discord.com/api/oauth2/authorize?client_id=1130535540849127464&redirect_uri=http%3A%2F%2Flocalhost%3A8000%2Fpages%2Fprocess_oauth.php&response_type=code&scope=identify%20guilds";
    header("Location: $discord_url");
    exit();
}



?>