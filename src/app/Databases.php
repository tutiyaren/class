<?php
namespace App;

use DateTimeInterface;
use PDO;

interface DatabasesInterface
{
    public function fetchAllDatabases();
}

class Databases implements DatabasesInterface
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

    public function fetchALlDatabases()
    {
        $sql = "SELECT a.accrual_date, (a.revenue - COALESCE(b.revenue, 0)) AS revenue
            FROM (
                SELECT DATE_FORMAT(accrual_date, '%Y-%m') AS accrual_date, SUM(amount) AS revenue
                FROM incomes
                GROUP BY DATE_FORMAT(accrual_date, '%Y-%m')
            ) AS a
            LEFT JOIN (
                SELECT DATE_FORMAT(accrual_date, '%Y-%m') AS accrual_date, SUM(amount) AS revenue
                FROM spendings
                GROUP BY DATE_FORMAT(accrual_date, '%Y-%m')
            ) AS b
            ON a.accrual_date = b.accrual_date
            ORDER BY a.accrual_date ASC";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $databases = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $databases;
    }
}

// $sql = "SELECT SUM(amount) AS revenue, DATE_FORMAT(accrual_date, '%Y-%m') AS accrual_date
//             FROM spendings
//             GROUP BY DATE_FORMAT(accrual_date, '%Y-%m')
//             ORDER BY accrual_date ASC";
