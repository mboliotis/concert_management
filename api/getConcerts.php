<?php
    require './config/mongodb_config.php';

    
     
 
    $filter = ['Organizer' => $_GET['username']];
    
    
    $query = new MongoDB\Driver\Query($filter);
    $cursor =  $mongo_driver_manager->executeQuery($concerts_db.'.'.$concerts_db_collection, $query);

    echo json_encode($cursor->toArray());

?>