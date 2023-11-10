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
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/nav.css" />
  </head>

  <body>
    <nav id="topnav">
        <ul>
            <a href="/index.php" class="active"><li>Home</li></a>
            <a href="../pages/staff.php"><li>Contact</li></a>
            <a href="../pages/comingsoon.php"><li>Account</li></a>
            <a href="../pages/hall0fame.php"><li>Honors</li></a>
        </ul>
    </nav>
  </body>
</html>
