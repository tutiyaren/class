<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\Incomes;
use App\Income_sources;

$incomesModel = new Incomes();
$incomes = $incomesModel->fetchAllIncomes();
$income_sourcesModel = new Income_sources();
$income_sources = $income_sourcesModel->fetchAllIncome_sources();

$combinedData = [];
foreach ($incomes as $income) {
    $incomeId = $income['id'];
    $incomeSourceId = $income['income_source_id'];
    foreach ($income_sources as $income_source) {
        if ($income_source['id'] == $incomeSourceId) {
            $combinedData[] = [
                'amount' => $income['amount'],
                'source_name' => $income_source['name']
            ];
            break; 
        }
    }
}

foreach ($combinedData as $data) {
    echo $data['source_name'] . ':  ';
    echo $data['amount'];
    echo "<br>";
    // echo "Date: " . $data['date'] . ", ";
}

