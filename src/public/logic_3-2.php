<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\Incomes;

$incomesModel = new Incomes();
$incomes = $incomesModel->fetchAllIncomes();

$monthTotals = []; 
foreach ($incomes as $income) {
    $dateParts = explode("-", $income['accrual_date']);
    $month = abs($dateParts[1]); 
    if (!isset($monthTotals[$month])) {
        $monthTotals[$month] = 0; 
    }
    $monthTotals[$month] += $income['amount']; 
}

arsort($monthTotals);

foreach ($monthTotals as $month => $total) {
    echo $month . "月: " . $total . "<br>";
}