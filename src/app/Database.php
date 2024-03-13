<?php
namespace App;
use PDO;

abstract class Database
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = new PDO(
            'mysql:host=mysql;dbname=tq_quest',
            'root',
            'password'
        );
    }
}
