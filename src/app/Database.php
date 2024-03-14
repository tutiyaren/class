<?php
namespace App;
use PDO;

require_once 'Database.php';

interface DatabaseInterface
{
    public function fetchAllDatabase();
}

class Database implements DatabaseInterface
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
    public function fetchAllDatabase()
    {
        $sql = "SELECT incomes.amount, income_sources.name
        FROM incomes
        JOIN income_sources 
        ON incomes.income_source_id = income_sources.id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $database = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $database;
    }
}
