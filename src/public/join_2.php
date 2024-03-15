<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\Database;

$databaseModel = new Database();
$database = $databaseModel->fetchAllDatabase();

foreach ($database as $data) {
    echo $data['name'] . ':  ';
    echo $data['amount'];
    echo "<br>";
}
