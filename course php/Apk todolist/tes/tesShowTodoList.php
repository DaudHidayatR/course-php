<?php
require_once __DIR__ .'./../models/TodoList.php';
require_once __DIR__ ."./../BusinessLogic/ShowTodoList.php";
$todolist[1] = "belajar PHP Dasar";
$todolist[2] = "belajar PHP OOP";
$todolist[3] = "belajar PHP Database";
showTodoList();