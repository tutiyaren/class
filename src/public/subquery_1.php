<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\Databases;

$databasesModel = new Databases();
$databases = $databasesModel->fetchALlDatabases();

foreach($databases as $database) {
    $month = $database['accrual_date'];
    $revenue = $database['revenue'];
    echo $month . 'の「合計収入 - 合計支出」:  ' . $revenue;
    echo '<br>';
}