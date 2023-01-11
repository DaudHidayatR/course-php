<?php

require_once __DIR__ . "./../models/Todolist.php";
require_once __DIR__ . "./../view/viewRemoveTodoList.php";
require_once __DIR__ . "./../BusinessLogic/AddTodoList.php";
require_once __DIR__ . "./../BusinessLogic/ShowTodoList.php";

addTodolist("daud");
addTodolist("hidayat");
addTodolist("ramadhan");
addTodolist("siraj");
addTodolist("jonas");
addTodolist("nabil");

showTodoList();

viewRemoveTodoList();

showTodoList();