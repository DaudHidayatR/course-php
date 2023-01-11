<?php
require_once __DIR__ . ("/models/TodoList.php");
require_once __DIR__ . ("/BusinessLogic/ShowTodoList.php");
require_once __DIR__ . ("/BusinessLogic/AddTodoList.php");
require_once __DIR__ . ("/BusinessLogic/RemoveTodoList.php");
require_once __DIR__ . ("/view/viewAddTodoList.php");
require_once __DIR__ . ("/view/viewRemoveTodoList.php");
require_once __DIR__ . ("/view/viewShowTodoList.php");
require_once __DIR__ . ("/helper/input.php");
echo "Aplikasi Todolist" . PHP_EOL;
viewTodoList();