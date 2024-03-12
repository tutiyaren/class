<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\Spendings;

$spendingModel = new Spendings();
$spendings = $spendingModel->fetchAllSpendings();

$monthTotals = [];
foreach($spendings as $spending) {
    $dateParts = explode('-', $spending['accrual_date']);
    $month = abs($dateParts[1]);
    $day = abs($dateParts[2]);

    if (!isset($monthTotals[$month])) {
        $monthTotals[$month] = 0; 
    }
    $monthTotals[$month] += $spending['amount']; 

    if(strpos($day, '5') !== false) {
        $monthTotals[$month] -= 100;
    }
}

arsort($monthTotals);

foreach ($monthTotals as $month => $total) {
    echo $month ."月: " . $total . "<br>";
}
