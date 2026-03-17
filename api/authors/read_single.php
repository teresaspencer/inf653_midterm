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

    // Get ID
    $author->id = isset($_GET['id']) ? $_GET['id'] : die();

    // Get author
    $result = $author->read_single();
    $row = $result->fetch(PDO::FETCH_ASSOC);

    // Create array
    if($row) {
        $author->id = $row['id'];
        $author->author = $row['author'];
        
        $author_arr = array(
            'id' => $author->id,
            'author' => $author->author
        );
        // Make JSON
        echo json_encode($author_arr);
    } else {
        echo json_encode(array('message' => 'No Author Found'));
    }