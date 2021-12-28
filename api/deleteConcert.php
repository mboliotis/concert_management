<?php
    require './config/mongodb_config.php';

    $bulk = new MongoDB\Driver\BulkWrite(['ordered' => true]);
    

    $bulk->delete(['Organizer' => $_GET['organizer'],
    '_id' => new MongoDB\BSON\ObjectId($_GET['id'])
    ]);


    $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
    $result = $mongo_driver_manager->executeBulkWrite($concerts_db.'.'.$concerts_db_collection, $bulk, $writeConcern);

    $return_res = array("message" => "Deleted: ".$result->getDeletedCount());

    echo json_encode($return_res);
?>