<?php
namespace App;
use PDO;

interface SpendingsInterface
{
    public function fetchAllSpendings();
}

class Spendings implements SpendingsInterface
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO(
            'mysql:dbname=tq_quest;host=mysql',
            'root',
            'password'
        );
    }

    public function fetchAllSpendings()
    {
        $sql = 'select * from spendings';
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $spendings = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $spendings;
    }
}