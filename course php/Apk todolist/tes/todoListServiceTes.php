<?php
require_once __DIR__ . "/../Entity/todolist.php";
require_once __DIR__ . "/../repository/todolistRepository.php";
require_once __DIR__ . "/../Service/todolistService.php";
require_once __DIR__ . "/../config/database.php";

use Service\TodolistServiceImpl;
use Repository\TodolistRepositorImpl ;
use Entity\Todolist;
function testShowTodolist():void
{

    $conn = \Config\Database::getConnection();
    $todolistRepository = new TodolistRepositorImpl($conn);
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->AddTodolist("daud");
    $todolistService->AddTodolist("siraj");
    $todolistService->AddTodolist("juan");
    $todolistService->AddTodolist("bintang");
    $todolistService->AddTodolist("Zahwa");
    $todolistService->AddTodolist("kipli");
    $todolistService->showTodolist();
}
function testAddTodolist(): void
{
    $conn = \Config\Database::getConnection();
    $todolistRepository = new TodolistRepositorImpl($conn);
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->AddTodolist("daud");
    $todolistService->AddTodolist("siraj");
    $todolistService->AddTodolist("juan");
    $todolistService->AddTodolist("bintang");
    $todolistService->AddTodolist("Zahwa");
    $todolistService->AddTodolist("kipli");
    // $todolistService->showTodolist();
}


function testRemoveTodolist(): void
{
    $conn = \Config\Database::getConnection();
    $todolistRepository = new TodolistRepositorImpl($conn);
    $todolistService = new TodolistServiceImpl($todolistRepository);
    echo $todolistService->removeTodolist("7").PHP_EOL;
    echo $todolistService->removeTodolist("6") . PHP_EOL;
    echo $todolistService->removeTodolist("5") . PHP_EOL;
    echo $todolistService->removeTodolist("4") . PHP_EOL;
    echo $todolistService->removeTodolist("3") . PHP_EOL;
    echo $todolistService->removeTodolist("2") . PHP_EOL;
    echo $todolistService->removeTodolist("1") . PHP_EOL;
    // $todolistService->showTodolist();
} 
testShowTodolist();
// testAddTodolist();
// testRemoveTodolist();
?>