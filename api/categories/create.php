<?php 
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Category.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate Category object
    $category = new Category($db);

    // Get raw data
    $data = json_decode(file_get_contents('php://input'));

    if(!isset($data->category) || empty($data->category)) {
        echo json_encode(array('message' => 'Missing Required Parameters'))
        exit();
    }
    $category->category = $data->category;

    // Create Category
    $id = $author->create();

    if($id) {
        echo json_encode(
            array('id' => $id, 'author' => $data->author)
        );
    } else {
        echo json_encode(
            array('message' => 'Category Not Created')
        );
    }