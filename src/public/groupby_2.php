<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\Spendings;

$spendingsModel = new Spendings();
$spendings = $spendingsModel->fetchAllSpendings();
foreach ($spendings as $result) {
    $month = $result['accrual_date'];
    $totalAmount = $result['SUM(amount)'];
    echo $month . "の合計収入: " . $totalAmount . "<br>";
}