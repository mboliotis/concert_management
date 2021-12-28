<?php
    require './config/mongodb_config.php';

    $bulk = new MongoDB\Driver\BulkWrite(['ordered' => true]);
    
    $filter = [
        '_id' => new MongoDB\BSON\ObjectId($_POST['id']),
        'Organizer' => $_POST['organizer']
    ];
    $bulk->update($filter,
    ['_id' => new MongoDB\BSON\ObjectId($_POST['id']),
    'Organizer' => $_POST['organizer'],
    'Title' => $_POST['title'],
    'Date' => $_POST['date'],
    'Artist' => $_POST['artist'],
    'Category' => $_POST['category']
    ]);


    $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
    $result = $mongo_driver_manager->executeBulkWrite($concerts_db.'.'.$concerts_db_collection, $bulk, $writeConcern);

    $return_res = array("message" => "Updated: ".$result-> getUpsertedCount());

    echo json_encode($return_res);
?>