<?php
require_once __DIR__ . ("/Entity/TodoList.php");
require_once __DIR__ . ("/helper/inputHelper.php");
require_once __DIR__ . ("/repository/todolistRepository.php");
require_once __DIR__ . ("/Service/todolistService.php");
require_once __DIR__ . ("/view/todoListView.php");
require_once __DIR__ . ("/config/database.php");

use Entity\Todolist;
use helper\InputHelper;
use Repository\TodolistRepositorImpl;
use Service\TodolistServiceImpl;
use View\TodoLIstView;

echo "Aplikasi Todolist" . PHP_EOL;
$conn = \config\Database::getConnection();
$todolistRepository = new TodolistRepositorImpl($conn);
$todolistService = new TodolistServiceImpl($todolistRepository);
$todolistView = new TodoListView($todolistService);

$todolistView->showTodolist();