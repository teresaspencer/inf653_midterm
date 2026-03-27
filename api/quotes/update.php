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

    if(!isset($data->id) || !isset($data->quote) || !isset($data->author_id) || !isset($data->category_id) || empty($data->quote)) {
        echo json_encode(array('message' => 'Missing Required Parameters'));
        exit();
    }

    // Check quote exists
    $quote_check = $db->prepare('SELECT id FROM quotes WHERE id = :id');
    $quote_check->bindParam(':id', $data->id);
    $quote_check->execute();
    if($quote_check->rowCount() === 0) {
        echo json_encode(array('message' => 'No Quotes Found'));
        exit();
    }

    // Check author exists
    $author_check = $db->prepare('SELECT id FROM authors WHERE id = :id');
    $author_check->bindParam(':id', $data->author_id);
    $author_check->execute();
    if($author_check->rowCount() === 0) {
        echo json_encode(array('message' => 'author_id Not Found'));
        exit();
    }

    // Check category exists
    $category_check = $db->prepare('SELECT id FROM categories WHERE id = :id');
    $category_check->bindParam(':id', $data->category_id);
    $category_check->execute();
    if($category_check->rowCount() === 0) {
        echo json_encode(array('message' => 'category_id Not Found'));
        exit();
    }

    $quote->quote = $data->quote;
    $quote->id = $data->id;
    $quote->author_id = $data->author_id;
    $quote->category_id = $data->category_id;

    // Update Quote
    if($quote->update()) {
        echo json_encode(
            array('id' => $data->id,
            'quote' => $data->quote,
            'author_id' => $data->author_id,
            'category_id' => $data->category_id)
        );
    } else {
        echo json_encode(
            array('message' => 'Quote Not Updated')
        );
    }