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
    // or: $quote->id = isset($_GET['id']) ? $_GET['id'] : die();

    // set ID to update
    $quote->id = $data->id;

    // Delete Quote
    if($quote->delete()) {
        echo json_encode(array('message' => 'Quote Deleted'));
    } else {
        echo json_encode(array('message' => 'Quote Not Deleted'));
    }