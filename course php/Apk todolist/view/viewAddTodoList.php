<?php
require_once __DIR__ . "./../helper/input.php";
require_once __DIR__ . "./../models/TodoList.php";
function viewTodoList(){
    echo "MENAMBAHKAN TODO".PHP_EOL;
    $todo = input("todo (x untuk batal) :");
    if ($todo === "x"){

    }else{
        addTodolist($todo);
    }
    
}