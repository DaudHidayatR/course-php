<?php
require_once __DIR__ . "./../Service/todolistService.php";
require_once __DIR__ . "./../Entity/todoList.php";
require_once __DIR__ . "./../repository/todolistRepository.php";
require_once __DIR__ . "./../view/todolistView.php";
require_once __DIR__ . "./../helper/inputHelper.php";
use Service\TodolistServiceImpl;
use Repository\TodolistRepositorImpl;
use Entity\Todolist;
use \View\TodolistView;
// function testViewShowTodoList()
// {
//     $todolistRepository = new TodolistRepositorImpl();
//     $todolistService = new TodolistServiceImpl($todolistRepository);
//     $todolistView = new TodolistView($todolistService);
//     $todolistService->addTodolist("Daud");
//     $todolistService->addTodolist("Siraj");
//     $todolistService->addTodolist("Juan");
//     $todolistService->addTodolist("Bintang");
//     $todolistService->addTodolist("kharisma");
//     $todolistService->addTodolist("sista");
//     $todolistView->showTodolist();

// }
// testViewShowTodoList();

function testViewAddTodoList()
{
    $todolistRepository = new TodolistRepositorImpl();
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistView = new TodolistView($todolistService);
    $todolistService->addTodolist("Daud");
    $todolistService->addTodolist("Siraj");
    $todolistService->addTodolist("Juan");
    $todolistService->addTodolist("Bintang");
    $todolistService->addTodolist("kharisma");
    $todolistService->addTodolist("sista");
    $todolistService->showTodolist();
    $todolistView->addTodolist();
    $todolistService->showTodolist();
    $todolistView->addTodolist();
    $todolistService->showTodolist();

}
testViewAddTodoList();
?>