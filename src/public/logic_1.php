<?php
$dbUserName = "root";
$dbPassword = "password";
$pdo = new PDO("mysql:host=mysql; dbname=tq_quest; charset=utf8", $dbUserName, $dbPassword);

$sql = "SELECT * FROM spendings";
$statement = $pdo->prepare($sql);
$statement->execute();
$spendings = $statement->fetchAll(PDO::FETCH_ASSOC);

$totalSpendingsAmount = 0;
foreach ($spendings as $income) {
  $totalSpendingsAmount += $income['amount'];
}
echo 'spendingsテーブルのamountカラムの合計: ' .$totalSpendingsAmount;