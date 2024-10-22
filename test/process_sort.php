<?php
// process_sort.php

// Assuming data is coming via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the posted sort parameters
    $sortBy = $_POST['sortBy'];
    $order = $_POST['order'];

    // Sample data to sort (replace with real data)
    $data = [
        ['name' => 'John', 'age' => 25],
        ['name' => 'Jane', 'age' => 22],
        ['name' => 'Doe', 'age' => 30]
    ];

    // Applying the custom sort logic
    foreach ($sortBy as $key => $sortField) {
        if (!empty($sortField)) {
            $currentOrder = $order[$key] === 'ASC' ? SORT_ASC : SORT_DESC;

            usort($data, function ($a, $b) use ($sortField, $currentOrder) {
                if ($currentOrder === SORT_ASC) {
                    return strcmp($a[$sortField], $b[$sortField]);
                } else {
                    return strcmp($b[$sortField], $a[$sortField]);
                }
            });
        }
    }

    // Return the sorted data as JSON
    echo json_encode($data);
}
