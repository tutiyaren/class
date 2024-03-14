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
            'mysql:host=mysql;dbname=tq_quest',
            'root',
            'password'
        );
    }

    public function fetchAllSpendings()
    {
        $sql = "SELECT SUM(amount), DATE_FORMAT(`accrual_date`, '%Y-%m') AS accrual_date
        FROM spendings
        GROUP BY DATE_FORMAT(accrual_date, '%Y-%m') 
        ORDER BY accrual_date ASC";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $spendings = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $spendings;
    }
}
