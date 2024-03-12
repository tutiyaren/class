<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\Spendings;

$spendingModel = new Spendings();
$spendings = $spendingModel->fetchAllSpendings();

$totalSpengindAmount = 0;
foreach($spendings as $spending) {
    $date = explode('-', $spending['accrual_date']);
    $month = abs($date[1]);
    $day = abs($date[2]);
    if($month != 9) continue;
    $totalSpengindAmount += $spending['amount'];
    if(strpos($day, '1') !== false) {
        $totalSpengindAmount -= 2000;
    }
}

echo '9月の支出の合計:  ' . $totalSpengindAmount;