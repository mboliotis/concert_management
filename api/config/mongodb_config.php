<?php
    $mongo_host = '172.18.1.9';
    $mongo_user = 'root';
    $mongo_pwd = '1234';
    $concerts_db = 'Concerts';
    $concerts_db_collection = 'concerts';
    $favorites_db = 'Favorites';
    $favorites_db_collection = 'favorites';
    $mongo_driver_manager = new MongoDB\Driver\Manager('mongodb://'.$mongo_user.':'.$mongo_pwd.'@'.$mongo_host);

?>