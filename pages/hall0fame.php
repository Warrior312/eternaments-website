<html>
    <!DOCTYPE html>
    <?php
        require_once 'header.php'
        
    ?>
    <link rel="stylesheet" href="HOF.css">

    <body>
    
        <div id="honorsBG">
            <?php
                print_r("Getting awardees");
                error_reporting(E_ALL);
                if(isset($_SESSION["connErr"])){
                    print_r($_SESSION["connErr"]);
                }
                $jsonData = file_get_contents("../config.json");
                $jsonData = json_decode($jsonData, true);
               
                require_once '../includes/dbh.inc.php';
                print_r("Cnnection Gotten");
                $sql = "SELECT COUNT(*) FROM hof";
                
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)){
                   print_r("errored");
                }
                mysqli_stmt_execute($stmt);

                $resultData = mysqli_stmt_get_result($stmt);
                $sql = "SELECT * FROM hof";
                
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)){
                   print_r("errored");
                }
                mysqli_stmt_execute($stmt);

                $rows = mysqli_stmt_get_result($stmt);
                $rows = mysqli_fetch_all($rows);
                
                
                for ($X = 0; count($rows); $X++){
                    echo '<div id="title"><?php // insert SQL data here ?>'. $rows[$X][1] .'</div>
                    <div id="awardees">';

                    foreach (explode(",", $rows[$X][2]) as $key => $value){
                        if ($value !== ","){
                            $discordId = $value;

                            
                            $token = $jsonData["token"];
                            $url = "https://discord.com/api/v9/users/{$discordId}";
                            
                            $options = array(
                                'http' => array(
                                    'header'  => "Authorization: Bot {$token}\r\n",
                                    'method'  => 'GET',
                                ),
                            );
                        
                            $context  = stream_context_create($options);
                            $response = file_get_contents($url, false, $context);
                            if($response !== false){
                                $response = json_decode($response, true);
                            
                                $avatar = $response["avatar"];
                                $avatarURL = 'https://cdn.discordapp.com/avatars/'. $discordId. '/'. $avatar .'.png';
                                echo '<div class="awardee">


                                <div class="profImg" style="background-image: url(' . $avatarURL . ');"></div>
                                <br>
                                <div id="textContainer">
                                    <div id="name", style="font-size: 2vw; font-family: monospace;">' . $response["global_name"] .'</div>
                                    <div id="discordHandle" style="font-size: 1vw; font-family: monospace;">' . $response["username"] .'</div>
                                </div>
                                    
                                </div>';
                            }
                        
                        }
                        
                        
                        
                        
                    }
                    echo '</div>';
                    exit();


        
                }
            ?>
            
        </div>

    </body>
</html>