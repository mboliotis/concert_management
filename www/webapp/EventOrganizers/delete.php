<?php

    session_start();


    

    $ch = curl_init();  
    $the_header = array('X-Auth-Token: '.$_SESSION['access_token_info']['access_token']);

    curl_setopt($ch, CURLOPT_HTTPHEADER, $the_header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL,"http://172.18.1.11/deleteConcert.php?id=".$_GET['id'].'&organizer='.$_SESSION['username']);
    curl_setopt($ch, CURLOPT_POST, false);

    $server_output = curl_exec($ch);
        
    curl_close ($ch);
    
    print_r($server_output);

?>