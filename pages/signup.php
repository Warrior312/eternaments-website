<?php require_once '../includes/maint.inc.php' ?>
<?php
    header("location: /pages/comingsoon.php");
    exit();
    if (!isset($_SESSION)) {
        session_start();
    }
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            // if user didn't fill out all fields, display this error 
            $fillErr = "Please fill out all fields.";
        }
        if ($_GET["error"] == "invaliduser") {
            // if the username is already taken, display this error message
            $nameErr = "This username is already taken.";
        }
        if ($_GET["error"] == "passnomatch") {
            // if passwords don't match, set passwordError to this
            $passRepErr = "Passwords do not match.";

        }
        if ($_GET["error"] == "passinval") {
            // if there's an issue with the password, set SESSION err to passError
            $passErr = $_SESSION["passError"];
        }

    }
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../pages/styles/signup.css">
</head>

<body>
    <?php include_once "../pages/header.php" ?>
    <div id="signupWrapper">
        <div id="signInTitle">
            <?php
                if (isset($_SESSION["userData"])) {
                    echo "Continue sign-up with Eternaments";
                } else {
                    echo "Log in to Eternaments";
                }
            ?>
        </div>

        <form action="/includes/signup.inc.php" autocomplete="off" method="post" id="logSignform">
            <div class="signIn">
                <input type="text" class="signin" name="userName" id="us" required>

                <label for="userName">Username</label>

                <div class="error" id="userError">
                    <?php echo $nameErr ?>
                </div>
            </div>
            <div class="signIn">
                <input type="password" class="signin" name="passWord" id="pw" required>

                <label for="passWord">Password</label>

                <div class="error" id="passwordError">
                    <?php echo $passErr ?>
                </div>

            </div>
            <?php
                if (isset($_SESSION["signingUp"])) {
                    echo '<div class="signIn">
                            <input type="password" class="signin" name="passWordRep" id="pwdr"required>
                            <label for="passWordRep">Repeat Password</label>
                            <div class="error" id="passwordRepError"><?php echo $passRepErr ?></div>
                        </div>';
                }
            ?>

            <div id="signupContainer">
                <?php
                if (isset($_SESSION["signingUp"])) {
                    echo '<button type="submit" name="compsign" id="signupAlt">Complete Sign Up</button>';
                } else {
                    echo ' <button type="submit" name="login"id="login">Log In</button> <a href="/pages/init_oauth.php" id="signUpmain" name="toSignUp">Sign Up</a>';
                }
                ?>
            </div>
        </form>
    </div>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
        window.onload = function () {
            if (sessionStorage.getItem("username") == "username") {
                return;
            }

            var name = sessionStorage.getItem("username")
            if (name !== null) $('#us').val(name);
            if (isset(% $_SESSION["signedIn"])) {
                header('location: /pages/account.php');
                exit();
            }
        }

        window.onbeforeunload = function () {
            sessionStorage.setItem("username", $('#us').val());
        }
    </script>
</body>

</html>