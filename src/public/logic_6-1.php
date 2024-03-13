<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\Categories;
use App\Spendings;

$categoriesModel = new Categories();
$categories = $categoriesModel->fetchAllCategories();
$spendingsModel = new Spendings();
$spendings = $spendingsModel->fetchAllSpendings();

foreach($categories as $category) {
    if($category['name'] == '水道光熱費') {
        $categoryId = $category['id'];
        $categoryName = $category['name'];
    }
}

foreach($spendings as $spending) {
    if($spending['category_id'] == $categoryId) {
        echo $spending['accrual_date'] . 'に支払った' . $categoryName . '料金: ' . $spending['amount'];
        echo '<br>';
    }
}