<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\Spendings;

$spendingModel = new Spendings();
$spendings = $spendingModel->fetchAllSpendings();

$totalSpendingsAmount = [];
foreach($spendings as $spending) {
  $date = explode('-', $spending["accrual_date"]);
  $month = abs($date[1]);
  $totalSpendingsAmounts[$month] += $spending["amount"];
}

for ($i = 1; $i < 12; $i++) {
  $spendingsDifference = abs($totalSpendingsAmounts[$i + 1] - $totalSpendingsAmounts[$i]);
  echo $i . "月と" . ($i + 1) . "月の差分: ". $spendingsDifference. "円";
  echo "<br />";
}