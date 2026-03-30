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

    $data = json_decode(file_get_contents('php://input'));
    // or: $author->id = isset($_GET['id']) ? $_GET['id'] : die();
    if (empty($data->id)) {
        http_response_code(400);
        echo json_encode(['message' => 'id is required']);
        exit();
    }

    // set ID to update
    $author->id = $data->id;

    // Delete Author
    if($author->delete()) {
        echo json_encode(array('id' => $data->id));
    } else {
        echo json_encode(array('message' => 'Author Not Deleted'));
    }