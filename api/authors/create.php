<?php 
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Author.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate author object
    $author = new Author($db);

    // Get raw data
    $data = json_decode(file_get_contents('php://input'));
    if(!isset($data->author) || empty($data->author)) {
        echo json_encode(array('message' => 'Missing Required Parameters'));
        exit();
    }

    $author->author = $data->author;

    // Create Author
    $id = $author->create();
    
    if($id) {
        echo json_encode(array('id' => $id, 'author' => $data->author));
    } else {
        echo json_encode(array('message' => 'Author Not Created'));
    }