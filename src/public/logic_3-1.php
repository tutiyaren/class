<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\Spendings;

$spendingsModel = new Spendings();
$spendings = $spendingsModel->fetchAllSpendings();

$sort = [];
foreach($spendings as $spendingKey => $spending) {
  $sort[$spendingKey] = $spending["amount"];
}

array_multisort($sort, SORT_ASC, $spendings);

foreach($spendings as $spendingBySort) {
  echo $spendingBySort["amount"];
  echo "<br />";
}