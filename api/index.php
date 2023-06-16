<?php

/*
* AUTOLOADER
*/

spl_autoload_register(function ($className) {
    // Convert the namespace separator to a directory separator
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);

    // Build the file path based on the class name and file extension
    $filePath = __DIR__ . DIRECTORY_SEPARATOR . $className . '.php';

    // Check if the file exists and require it
    if (file_exists($filePath)) {
        require_once $filePath;
    }
});

// Shortening full class names 

use Controllers\ProductController as ProductController;
use Database\DB as DB;

// Error Handler

function handleException($exception)
{
    http_response_code(500);
    echo json_encode([
        "code" => $exception->getCode(),
        "message" => $exception->getMessage(),
        "file" => $exception->getFile(),
        "line" => $exception->getLine()
    ]);
}

/*
* THE FUNCTION
*/

// Extract request arguments from URI

set_exception_handler("handleException");
header("Content-Type: application/json; charset=UTF-8");

$parts = explode("/", $_SERVER['REQUEST_URI']);
$method = $_SERVER["REQUEST_METHOD"];
$id = $parts[3] ?? null;


$db = new DB;
$db->connect();

$controller = new ProductController;
$controller->processRequest($method, $id);
