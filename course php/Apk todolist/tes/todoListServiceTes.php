<?php
require_once __DIR__. "./../Service/todolistService.php";
require_once __DIR__ ."./../Entity/todoList.php";
require_once __DIR__ . "./../repository/todolistRepository.php";

use Service\TodolistServiceImpl;
use Repository\TodolistRepositorImpl ;
function testShowTodolist():void
{

    $todolistRepository = new TodolistRepositorImpl();
    $todolistRepository->todolist[1] = "daud";
    $todolistRepository->todolist[2] = "siraj";
    $todolistRepository->todolist[3] = "juan";
    $todolistRepository->todolist[4] = "bintang";
    $todolistRepository->todolist[5] = "zahwa";
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->showTodolist();
}
testShowTodolist();
?>