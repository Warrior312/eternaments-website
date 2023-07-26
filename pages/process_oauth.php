<?php
    $serverName = "localhost";
    $dBUsername = "eternao4_admin";
    $dBPassword = "6Ela-g4lu*q&";
    $dBName = "eternao4_webite_data";

    if(!isset($_GET['code'])){
        echo 'no code';
        exit();
    }

    $discord_code = $_GET['code'];

    $payload = [
        'code'=>$discord_code,
        'client_id'=>"1130535540849127464",
        'client_secret'=>"jJOi8PmfDs2Xq7mavSU_631PlMg9Uj7W",
        'grant_type'=>"authorization_code",
        'redirect_uri'=>'http://localhost:8000/pages/process_oauth.php',
        'scope'=>"identify%20guids"
    ];

    

    $payload_string = http_build_query($payload);

    $discord_token_url = "https:/discordapp.com/api/oauth2/token";

   

    
   


    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, $discord_token_url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, $payload);

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);

    $result = curl_exec($ch);
    

    
    $result = json_decode($result, true);
    $access_token = $result['access_token'];

    $discord_users_url = "https://discordapp.com/api/users/@me";
    $header = array("Authorization: Bearer $access_token", "Content-Type: application/x-www-form-urlencoded");


    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_URL, $discord_users_url);
    curl_setopt($ch, CURLOPT_POST, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);

    $result = curl_exec($ch);
    $result = json_decode($result, true);
    session_start();
    print_r($result);
    $_SESSION['signingUp'] = true;
    $_SESSION['userData'] = [
        'name'=>$result['username'],
        'discordId'=>$result['id'],
        'avatar'=>$result['avatar'],
    ];

    header("location: /pages/signup.php");
    exit();
?>


    