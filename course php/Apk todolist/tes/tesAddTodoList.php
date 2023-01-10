<?php

require_once __DIR__ . "./../models/TodoList.php";
require_once __DIR__ . "./../BusinessLogic/AddTodoList.php";

addTodolist("daud");
var_dump($todoList);