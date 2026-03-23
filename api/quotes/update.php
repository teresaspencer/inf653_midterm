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

    // Get raw data
    $data = json_decode(file_get_contents('php://input'));
    $quote->quote = $data->quote;
    $quote->id = $data->id;
    $quote->author_id = $data->author_id;
    $quote->category_id = $data->category_id;

    // Update Quote
    if($quote->update()) {
        echo json_encode(
            array('message' => 'Quote Updated')
        );
    } else {
        echo json_encode(
            array('message' => 'Quote Not Updated')
        );
    }