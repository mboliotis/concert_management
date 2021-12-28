<?php  
    session_start();
    /**
     * Step 1) Use the authorization code to get access token
     * Step 2) Use the access token to get user info (username, role) 
     * Step 3) Use the role to redirect to appropriate page
     **/    
    
    require('./../config/keyrock_conf.php');
    
   
    //*************  Get Access Token
    $ch = curl_init();  
    $post_header = array(
        'Host:172.18.1.5',
        'Authorization: Basic '.$authorization_basic,
        'Content-Type: application/x-www-form-urlencoded' 
    );

    curl_setopt($ch, CURLOPT_HTTPHEADER, $post_header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL,"http://172.18.1.5:3000/oauth2/token");
    curl_setopt($ch, CURLOPT_POST, true);
    
    $post_data="grant_type=authorization_code&code=".$_GET['code']."&redirect_uri=".$redirect_uri_urlencoded;
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);
        
    curl_close ($ch);
    //*************  Get Access Token

    // fetch data
    $_SESSION['access_token_info'] =json_decode($server_output, true);
    
    session_data();
    
    if(isset($_SESSION['username'])){
        $_SESSION['loggedin'] = true;
    }
    else{
        $_SESSION['loggedin'] = false;
    }


    // redirect user
    if ($_SESSION['role'] == "Users"){
        
        header('Location: ./Users/index.php');
    }
    else{
        if ($_SESSION['role'] == "EventOrganizers"){
            header('Location: ./EventOrganizers/index.php');
        }
        else{
            header('Location: ./out.php');
        }
    }
  

?>


<?php

function session_data() {
    $ch = curl_init();   
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL,"http://172.18.1.5:3000/user?access_token=".$_SESSION['access_token_info']['access_token']);
    curl_setopt($ch, CURLOPT_POST, false);

    $server_output = curl_exec($ch);
        
    curl_close ($ch);
    $server_output = json_decode($server_output, true);

    $_SESSION['username'] = $server_output['username'];
    $_SESSION['email'] = $server_output['email'];
    $_SESSION['role'] = $server_output['roles'][0]['name'];
} 

?>