<?php
namespace App;
use PDO;

require_once 'Database.php';

interface Income_sourcesInterface
{
    public function fetchAllIncome_sources();
}

class Income_sources extends Database implements Income_sourcesInterface
{
    public function fetchAllIncome_sources()
    {
        $sql = 'SELECT * FROM income_sources';
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $cincome_sources = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $cincome_sources;
    }
}