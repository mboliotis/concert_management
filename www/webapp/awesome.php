<?php
        // get Authorization code
        require('./../config/keyrock_conf.php');       
        $newURL = "http://172.18.1.5:3000/oauth2/authorize?response_type=code&client_id=b5263b0e-6835-4152-8662-a0e9b9f78190&state=mystate&redirect_uri=".$redirect_uri;
        header('Location: '.$newURL);
           
?>