<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require "api/services/DB.php";

use Api\Services\DB;

require "api/controllers/PostsController.php";

use Api\Controllers\PostsController;

(new PostsController())->getPosts();
