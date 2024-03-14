<?php
namespace App;
use PDO;

interface IncomesInterface
{
    public function fetchAllIncomes();
}

class Incomes implements IncomesInterface
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

    public function fetchAllIncomes()
    {
        $sql = "SELECT SUM(amount), DATE_FORMAT(`accrual_date`, '%Y-%m') AS accrual_date
        FROM incomes
        GROUP BY DATE_FORMAT(accrual_date, '%Y-%m') 
        ORDER BY accrual_date ASC";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $incomes = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $incomes;
    }
}
