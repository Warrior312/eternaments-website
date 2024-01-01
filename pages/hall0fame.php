<?php require_once '../includes/maint.inc.php' ?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1 minimum-scale=1" />

    <link rel="stylesheet" href="../pages/HOF.css">
</head>

<body>
    <?php require_once 'header.php' ?>

    <div id="honorsBG">
        <?php
       
        // this PHP code checks for connection errors to the discord channel.
        if (isset($_SESSION["connErr"])) {
            print_r($_SESSION["connErr"]);
        }
        $jsonData = file_get_contents("../config.json");
        $jsonData = json_decode($jsonData, true);
        // requires the database connection
        require_once '../includes/dbh.inc.php';

        $sql = "SELECT COUNT(*) FROM hof";
        // initializes the connection
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            print_r("errored");
        }
        mysqli_stmt_execute($stmt);
        // after executing the statement, get the result data
        $resultData = mysqli_stmt_get_result($stmt);
        $sql = "SELECT * FROM hof";
        // init the statement again
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            print_r("errored");
        }
        mysqli_stmt_execute($stmt);
        // fetching sql rows
        $rows = mysqli_stmt_get_result($stmt);
        $rows = mysqli_fetch_all($rows);

        // for each row, grab discord ID's, title, and other data from hall of fame channel (stored in MySQL)
        for ($X = 0; count($rows); $X++) {
            // echo the div for the honors title, where all playercards get stored.
            echo '<div id="title"><?php // insert SQL data here ?>' . $rows[$X][1] . '</div>
                    <div id="awardees">';
            print_r($rows);
            foreach (explode(",", $rows[$X][2]) as $key => $value) {
                print_r($value);
                print_r("\n");
                if ($value !== ",") {
                    // grabbing discordId 
                    $discordId = $value;
                    print_r("Passed the vlaue check");
                    // collect token
                    $token = $jsonData["token"];
                    print_r($token);
                    $url = "https://discord.com/api/v9/users/{$discordId}";
                    // start up oauth to connect to the discord service
                    $options = array(
                        'http' => array(
                            'header' => "Authorization: Bot {$token}\r\n",
                            'method' => 'GET',
                        ),
                    );
                    // grabbing context of oauth with given options
                    $context = stream_context_create($options);
                    $response = file_get_contents($url, false, $context);
                    print_r($response);
                    if ($response !== false) {
                        $response = json_decode($response, true);
                        // grabbing avatar URL after getting response json
                        $avatar = $response["avatar"];
                        $avatarURL = 'https://cdn.discordapp.com/avatars/' . $discordId . '/' . $avatar . '.png';
                        // if there's a result, echo the proper html to create a playercard.
                        echo '<div class="awardee">


                                <div class="profImg" style="background-image: url(' . $avatarURL . ');"></div>
                                <br>
                                <div id="textContainer">
                                    <div id="name", style="font-family: monospace;">' . $response["global_name"] . '</div>
                                    <div id="discordHandle" style=" font-family: monospace;">' . $response["username"] . '</div>
                                </div>
                                    
                                </div>';
                    }
                }
            }
            // echo ending div tag
            echo '</div>';
            exit();
        }
        ?>
    </div>
</body>

</html>