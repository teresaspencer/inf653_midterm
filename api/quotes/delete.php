<?php 
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Quote.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate Quote object
    $quote = new Quote($db);

    $data = json_decode(file_get_contents('php://input'));

    // Check quote exists
    $quote_check = $db->prepare('SELECT id FROM quotes WHERE id = :id');
    $quote_check->bindParam(':id', $data->id);
    $quote_check->execute();
    if($quote_check->rowCount() === 0) {
        echo json_encode(array('message' => 'No Quotes Found'));
        exit();
    }

    // set ID to update
    $quote->id = $data->id;

    // Delete Quote
    if($quote->delete()) {
        echo json_encode(array('id' => $data->id));
    } else {
        echo json_encode(array('message' => 'Quote Not Deleted'));
    }