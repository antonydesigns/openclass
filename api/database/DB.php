<?php

namespace Database;

use PDO;

class DB
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $db_name = 'open_class_db';

    public function connect()
    {
        $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset=utf8";
        return new PDO($dsn, $this->user, $this->password);
    }
}
