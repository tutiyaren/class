<?php
namespace App;
use PDO;

require_once 'Database.php';

interface IncomesInterface
{
    public function fetchAllIncomes();
}

class Incomes extends Database implements IncomesInterface
{
    public function fetchAllIncomes()
    {
        $sql = 'SELECT * FROM incomes';
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $incomes = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $incomes;
    }
}