<?php require_once '../includes/maint.inc.php' ?>
<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    if (!$_SESSION['logged_in']) {
        header("location: /pages/err.php");
        exit();
    } else {
        extract($_SESSION['userData']);
        $avatar_url = "https://cdn.discordapp.com/avatars/$discordId/$avatar.jpg" . "?size=240";
    }
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../styles/acc.css">
</head>

<body>
    <?php include_once "header.php" ?>

    <div id="wrapper">
        <div id="identifierWrapper">
            <img src=<?php
            if ($_SESSION['logged_in']) {
                echo $avatar_url . "?size=2048";
            } else {
                echo 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/46/Question_mark_%28black%29.svg/800px-Question_mark_%28black%29.svg.png';
            }
            ?> id="bigAvatar">

            <div id="names">
                <div id="userName">Connected Discord Account:
                    <?php echo $name ?>
                </div>
                <div id="AP">No Accumulated Penalty Points. Great Job!</div>
            </div>
        </div>
    </div>
</body>

</html>