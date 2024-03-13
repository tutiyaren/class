<?php
namespace App;
use PDO;

require_once 'Database.php';

interface SpendingsInterface
{
    public function fetchAllSpendings();
}

class Spendings extends Database implements SpendingsInterface
{
    public function fetchAllSpendings()
    {
        $sql = 'SELECT * FROM spendings';
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $spendings = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $spendings;
    }
}