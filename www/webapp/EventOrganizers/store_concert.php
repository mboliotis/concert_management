<?php
    session_start();


    $concert_data = array(
    'organizer' => $_SESSION['username'],
    'title' => $_POST['title'],
    'date' => $_POST['date'],
    'artist' => $_POST['artist'],
    'category' => $_POST['category']
    );
    
    $ch = curl_init();  
    $post_header = array('X-Auth-Token: '.$_SESSION['access_token_info']['access_token']);

    curl_setopt($ch, CURLOPT_HTTPHEADER, $post_header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL,"http://172.18.1.11/newConcert.php");
    curl_setopt($ch, CURLOPT_POST, true);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, $concert_data);
 
    

    $server_output = curl_exec($ch);
        
    curl_close ($ch);

    header('Location: ./index.php');

?>