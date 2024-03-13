<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\Categories;
use App\Spendings;

$categoriesModel = new Categories();
$categories = $categoriesModel->fetchAllCategories();
$spendingsModel = new Spendings();
$spendings = $spendingsModel->fetchAllSpendings();

$categoryId = null;

foreach($categories as $category) {
    if($category['name'] == '交際費') {
        $categoryId = $category['id'];
        break;
    }
}

foreach($spendings as $spending) {
    if($spending['category_id'] == $categoryId) {
        $useCompanionship = $spending['name'];
    }
    if($spending['category_id'] == $categoryId) {
        echo $spending['accrual_date'] . 'に支払った' . $useCompanionship . '料金: ' .$spending['amount'];
        echo'<br>';
        continue;
    }
}
