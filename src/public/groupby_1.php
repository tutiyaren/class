<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\Incomes;

$incomesModel = new Incomes();
$incomes = $incomesModel->fetchAllIncomes();
foreach ($incomes as $result) {
    $month = $result['accrual_date'];
    $totalAmount = $result['SUM(amount)'];
    echo $month . "の合計収入: " . $totalAmount . "<br>";
}