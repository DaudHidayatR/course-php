<?php
require_once __DIR__ . "./../view/viewShowTodolist.php";
require_once __DIR__ . "./../BusinessLogic/AddTodoList.php";
addTodolist("daud");
addTodolist("Hidayat");
addTodolist("Ramadhan");
addTodolist("belajar");
addTodolist("pemrograman");
addTodolist("PHP");

viewTodoList();