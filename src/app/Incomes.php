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
        $sql = 'SELECT * FROM incomes';
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $incomes = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $incomes;
    }
}