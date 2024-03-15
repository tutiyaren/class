<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\Spendings;

$spendingsModel = new Spendings();
$spendings = $spendingsModel->fetchAllSpendings();

foreach($spendings as $spending) {
    $date = explode("-", $spending["accrual_date"]);
    $month = abs($date[1]);
    if($month == 2){
        echo $spending["name"] . ": " . $spending["amount"];
        echo "<br />";
    }
}