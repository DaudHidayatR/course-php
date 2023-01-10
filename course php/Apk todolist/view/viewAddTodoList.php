<?php
require_once __DIR__ . "./../helper/input.php";
require_once __DIR__ . "./../models/TodoList.php";
function viewAddTodoList()
{
    echo "MENAMBAHKAN TODO" . PHP_EOL;
    $todo = input("todo (x untuk batal)");
    if ($todo === "x") {
        echo "batal menambahkan Todo" . PHP_EOL;
    } else {
        addTodolist($todo);
    }

}