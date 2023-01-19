<?php
require_once __DIR__. "./../Service/todolistService.php";
require_once __DIR__ ."./../Entity/todoList.php";
require_once __DIR__ . "./../repository/todolistRepository.php";

use Service\TodolistServiceImpl;
use Repository\TodolistRepositorImpl ;
use \Entity\Todolist;
function testShowTodolist():void
{

    $todolistRepository = new TodolistRepositorImpl();
    $todolistRepository->todolist[1] = new Todolist("daud");
    $todolistRepository->todolist[2] =  new Todolist("siraj");
    $todolistRepository->todolist[3] =  new Todolist("juan");
    $todolistRepository->todolist[4] =  new Todolist("bintang");
    $todolistRepository->todolist[5] =  new Todolist("zahwa");
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->showTodolist();
}
function testAddTodolist(): void
{

    $todolistRepository = new TodolistRepositorImpl();
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->AddTodolist("daud");
    $todolistService->AddTodolist("siraj");
    $todolistService->AddTodolist("juan");
    $todolistService->AddTodolist("bintang");
    $todolistService->AddTodolist("Zahwa");
    $todolistService->AddTodolist("kipli");
    $todolistService->showTodolist();
}
testShowTodolist();
testAddTodolist();
?>