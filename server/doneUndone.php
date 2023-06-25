<?php

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");
header("Content-Type: application/json");

$todosDB = "toDos.json";

$taskIndexObject = $_POST;
$taskIndex = $taskIndexObject['index'];

$todosStr = file_get_contents($todosDB);
$todos = json_decode($todosStr);

$todos[$taskIndex] -> taskDone = !$todos[$taskIndex] -> taskDone;

$encodedTodos = json_encode($todos);

file_put_contents($todosDB,$encodedTodos);

echo $encodedTodos;