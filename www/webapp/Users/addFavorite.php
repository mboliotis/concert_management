<?php
    session_start();


    $concert_data = array(
    'id' => $_GET['id'],
    'user' => $_SESSION['username'],
    'title' => $_GET['title'],
    'date' => $_GET['date'],
    'artist' => $_GET['artist'],
    'category' => $_GET['category']
    );
    
    $ch = curl_init();  
    $post_header = array('X-Auth-Token: '.$_SESSION['access_token_info']['access_token']);

    curl_setopt($ch, CURLOPT_HTTPHEADER, $post_header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL,"http://172.18.1.11/insertFavorite.php");
    curl_setopt($ch, CURLOPT_POST, true);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, $concert_data);
 

    $server_output = curl_exec($ch);
        
    curl_close ($ch);

    echo $server_output;
    //header('Location: ./index.php');

?>