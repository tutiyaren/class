<?php
namespace App;
use PDO;

require_once 'Database.php';

interface CategoriesInterface
{
    public function fetchAllCategories();
}

class Categories extends Database implements CategoriesInterface
{
    public function fetchAllCategories()
    {
        $sql = 'SELECT * FROM categories';
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $categories = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }
}