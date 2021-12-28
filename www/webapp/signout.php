<?php
    session_start();
    session_destroy();
    


    require './../config/keyrock_conf.php';
    $url = $signout_url.'?client_id='.$client_id;
    $ch = curl_init();
     
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE"); 
    
    //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $result = curl_exec($ch);
    
    
     
    curl_close($ch);

    return $result; 


    
    
?>