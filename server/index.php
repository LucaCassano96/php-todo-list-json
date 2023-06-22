

<?php

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");
header("Content-Type: application/json");

$toDo = [

    [
        "taskName" => "comprare pane",
        "taskDone" => false,
    ],

    [
        "taskName" => "comprare latte",
        "taskDone" => false,
    ],

    [
        "taskName" => "comprare mele",
        "taskDone" => false,
    ]

];

echo json_encode($toDo);