<?php
    require './config/mongodb_config.php';

    $bulk = new MongoDB\Driver\BulkWrite(['ordered' => true]);
    

    $bulk->insert(['Organizer' => $_POST['organizer'],
    'Title' => $_POST['title'],
    'Date' => $_POST['date'],
    'Artist' => $_POST['artist'],
    'Category' => $_POST['category']
    ]);


    $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
    $result = $mongo_driver_manager->executeBulkWrite($concerts_db.'.'.$concerts_db_collection, $bulk, $writeConcern);

    $return_res = array("message" => "Inserted: ".$result->getInsertedCount());

    echo json_encode($return_res);
?>