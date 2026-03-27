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

    // Get ID
    $quote->id = isset($_GET['id']) ? $_GET['id'] : die();

    // Get quote
    $result = $quote->read_single();
    $row = $result->fetch(PDO::FETCH_ASSOC);

    // Create array
    if($row) {
        $quote_arr = array(
            'id' => $row['id'],
            'quote' => $row['quote'],
            'author' => $row['author'],
            'category' => $row['category']

        );
        // Make JSON
        echo json_encode($quote_arr);
    } else {
        echo json_encode(array('message' => 'No Quotes Found'));
    }