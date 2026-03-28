<?php
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = trim($path, '/');
$parts = explode('/', $path);

if($parts[0] === 'api' && isset($parts[1])) {
    $resource = $parts[1];
    if(in_array($resource, ['authors', 'quotes', 'categories'])) {
        include __DIR__ . '/api/' . $resource . '/index.php';
        exit();
    }
}