<?php
    session_start();
    echo $_SESSION['access_token_info']["access_token"];
    echo '</br>';
    $ch = curl_init();  
    $post_header = array(
        'Host:172.18.1.11',
        'X-Auth-Token: '.$_SESSION['access_token_info']["access_token"]
    );

    curl_setopt($ch, CURLOPT_HTTPHEADER, $post_header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL,"http://172.18.1.11/test.php");
    curl_setopt($ch, CURLOPT_POST, false);
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);
        
    curl_close ($ch);
    
    echo $server_output;
    
    //echo phpinfo();
    
    

?>