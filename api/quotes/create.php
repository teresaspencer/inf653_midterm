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

    if(!isset($data->quote) || !isset($data->author_id) || !isset($data->category_id) || empty($data->quote)) {
        echo json_encode(array('message' => 'Missing Required Parameters'));
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
    $quote->author_id = $data->author_id;
    $quote->category_id = $data->category_id;
    
    // Create Quote
    $id = $quote->create();

    if($id) {
        echo json_encode(
            array('id' => $id,
            'quote' => $data->quote,
            'author_id' => $data->author_id,
            'category_id' => $data->category_id)
        );
    } else {
        echo json_encode(
            array('message' => 'Quote Not Created')
        );
    }