<?php

namespace Api\Services;

use mysqli;

class DB
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $db_name = 'open_class_db';


    public function database()
    {

        // make new connection

        $conn = new mysqli($this->host, $this->user, $this->password, $this->db_name);

        // check connection

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }
}
