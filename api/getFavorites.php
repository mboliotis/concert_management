<?php
    require './config/mongodb_config.php';

    
     
 
    $filter = ['User' => $_GET['username']];
    
    
    $query = new MongoDB\Driver\Query($filter);
    $cursor =  $mongo_driver_manager->executeQuery($favorites_db.'.'.$favorites_db_collectio, $query);

    echo json_encode($cursor->toArray());

?>