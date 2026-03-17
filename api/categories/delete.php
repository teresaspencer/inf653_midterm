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

    $data = json_decode(file_get_contents('php://input'));
    // or: $category->id = isset($_GET['id']) ? $_GET['id'] : die();

    // set ID to update
    $category->id = $data->id;

    // Delete Category
    if($category->delete()) {
        echo json_encode(array('message' => 'Category Deleted'));
    } else {
        echo json_encode(array('message' => 'Category Not Deleted'));
    }