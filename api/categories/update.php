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

    if(!isset($data->id) || !isset($data->category) || empty($data->category)) {
        echo json_encode('message' => 'Missing Required Parameters');
        exit();
    }

    $category->id = $data->id;
    $category->category = $data->category;
    

    // Update Category
    if($category->update()) {
        echo json_encode(
            array('id' => $data->id,
            'category' => $data->category)
        );
    } else {
        echo json_encode(
            array('message' => 'Category Not Updated')
        );
    }