<?php
// menghapus todolist

function removeTodoLIst(int $number)
{
    global $todoList;
    if ($number > sizeof($todoList)) {
        return false;
    }
    for ($i = 0; $i < sizeof($todoList); $i++) {
        $todoList[$i] = $todoList[$i + 1];
    }
    unset($todoList[sizeof($todoList)]);
    return true;
}