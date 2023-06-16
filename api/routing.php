<?php

// error_reporting(E_ALL);
// ini_set('display_errors', '1');

require 'services/DB.php';
require 'controllers/PostsController.php';

$link = $_SERVER['REQUEST_URI'];

// Routes

$urls = [
    'api/posts' => ['PostsController@getPostsFromDatabase']
];

echo "what are we going to do?";
