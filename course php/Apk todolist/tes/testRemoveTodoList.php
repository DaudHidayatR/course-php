<?php
require_once __DIR__ . "./../models/TodoList.php";
require_once __DIR__ . "./../BusinessLogic/ShowTodoList.php";
require_once __DIR__ . "./../BusinessLogic/AddTodoList.php";
require_once __DIR__ . "./../BusinessLogic/RemoveTodoList.php";

addTodolist("daud");
addTodolist("hidayat");
addTodolist("ramadhan");
addTodolist("siraj");
addTodolist("jonas");
addTodolist("nabil");

showTodoList();

removeTodoLIst(5);
showTodoList();