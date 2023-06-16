<?php

namespace Api\Controllers;

use Api\Services\DB;

class PostsController
{
    public $conn = null;

    public function __construct()
    {
        // create connection

        $this->conn = (new DB())->database();
    }

    // Get post from 3rd party API

    public function getPosts()
    {
        try {

            //get posts

            $url = 'https://jsonplaceholder.typicode.com/posts';
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_ENCODING, 0);
            curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));

            // getting images

            /* $url_img = 'https://jsonplaceholder.typicode.com/imagess';
            $ch_img = curl_init();


            curl_setopt($ch_img, CURLOPT_AUTOREFERER, TRUE);
            curl_setopt($ch_img, CURLOPT_HEADER, 0);
            curl_setopt($ch_img, CURLOPT_ENCODING, 0);
            curl_setopt($ch_img, CURLOPT_MAXREDIRS, 10);
            curl_setopt($ch_img, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch_img, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($ch_img, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch_img, CURLOPT_URL, $url_img);
            curl_setopt($ch_img, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt($ch_img, CURLOPT_HTTPHEADER, array("Content-Type: application/json")); */

            $response_posts = json_decode(curl_exec($ch), true);
            /* $response_img = json_decode(curl_exec($ch_img), true); */

            echo "<pre>";

            var_dump($response_posts);
            exit();
        } catch (\Exception $e) {

            var_dump($e->getMessage());
            exit();
        }
    }
}
