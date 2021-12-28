<?php
    // this is not safe!!!
    $client_id='b5263b0e-6835-4152-8662-a0e9b9f78190';
    $client_secret='00c72d72-0928-4209-8ebc-38d800945788'; 
    $redirect_uri='http://172.18.1.7/webapp/landingPage.php';
    $redirect_uri_urlencoded=urlencode("http://172.18.1.7/webapp/landingPage.php");
    $authorization_basic = base64_encode($client_id.':'.$client_secret);
    $server_url="http://172.18.1.5:3000";
    $signout_url = $server_url.'/auth/external_logout';
?>