<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\Spendings;
use App\Categories;

$spendingsModel = new Spendings();
$spendings = $spendingsModel->fetchAllSpendings();
$categoriesModel = new Categories();
$categories = $categoriesModel->fetchAllCategories();

$combinedData = [];
foreach ($spendings as $spending) {
    $spendingId = $spending['id'];
    $categoryId = $spending['category_id'];
    foreach ($categories as $category) {
        if ($category['id'] == $categoryId) {
            $combinedData[] = [
                'amount' => $spending['amount'],
                'name' => $category['name']
            ];
            break;
        }
    }
}

foreach ($combinedData as $data) {
    echo $data['name'] . ':  ';
    echo $data['amount'];
    echo '<br>';
}
