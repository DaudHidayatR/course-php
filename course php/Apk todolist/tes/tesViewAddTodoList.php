<?php
require_once __DIR__ . "./../view/viewAddTodoList.php";
require_once __DIR__ . "./../BusinessLogic/ShowTodoList.php";
require_once __DIR__ . "./../BusinessLogic/AddTodoList.php";


addTodolist("daud");
addTodolist("hidayat");
addTodolist("ramadhan");
addTodolist("siraj");
addTodolist("jonas");
addTodolist("nabil");

viewAddTodoList();
showTodoList();