<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\Incomes;

$incomesModel = new Incomes();
$incomes = $incomesModel->fetchAllIncomes();

$totalIncomesAmounts = [];
foreach($incomes as $income) {
    $date = explode('-', $income['accrual_date']);
    $month = abs($date[1]);
    $totalIncomesAmounts[$month] += $income['amount'];
}


for($i = 1; $i < 6; $i++) {
    $incomesDifference = abs($totalIncomesAmounts[$i + 1]) - $totalIncomesAmounts[$i];
    echo $i . "月と" . ($i + 1) . "月の差分: ". abs($incomesDifference). "円";
    echo "<br />";
}