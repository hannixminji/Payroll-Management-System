<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../database/database.php';
use App\Helpers\Helper;
// Define an array of data
$data = [
    ["Name" => "Alice", "Age" => 28, "City" => "New York"],
    ["Name" => "Bob", "Age" => 32, "City" => "Los Angeles"],
    ["Name" => "Charlie", "Age" => 25, "City" => "Chicago"],
];

$query = "
    SELECT * FROM admins
    GROUP BY password
";

$statement = $pdo->prepare($query);
$statement->execute();
print_r($statement->fetchAll(PDO::FETCH_ASSOC));


$result = [
    'success' => false,
    'message' => Helper::generateCsrfToken('okie')
];

include_once 'okay.php';

/*
    Parang ganito pre oh, sa `index.php` yung frontend ng job_titles mo
    kasama nadun yung ajax. Tapos dapat eto `dataType: 'html'` sa ajax hanapin mo sa `index.php` para ibigay na
    naka html na katulad sa `okay.php` yung ajax request.
    Diba pag ajax data yung ibibigay as response saten yung html yung may design para ma access ng html na may design yung data dito sa `data.php`
    makikita mo naman na nilagay kong array, nandito yung array tapos gumawa ako ng file na `okay.php` na html pero naaccess parin ng `okay.php`.
*/
