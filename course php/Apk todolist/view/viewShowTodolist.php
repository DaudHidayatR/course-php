<?php
require_once __DIR__ . "./../view/viewRemoveTodoList.php";
require_once __DIR__ . "./../view/viewAddTodoList.php";
require_once __DIR__ . "./../BusinessLogic/ShowTodoList.php";
require_once __DIR__ . "./../helper/input.php";
require_once __DIR__ . "./../models/TodoList.php";

function viewTodoList()
{
    while (true) {
        showTodoList();
        echo "MENU" . PHP_EOL;
        echo "1. Tambah Todo" . PHP_EOL;
        echo "2. Hapus Todo" . PHP_EOL;
        echo "x. keluar" . PHP_EOL;

        $pilihan = input("pilih");
        if ($pilihan == "1") {
            // ViewAddTodoList();
        } else if ($pilihan == "2") {
            // ViewRemoveTodoList();
        } else if ($pilihan == "x") {
            break;
        } else {
            echo "pilihan anda salah, silahkan masukaan ulang" . PHP_EOL;
        }
    }
    echo "sampai jumpa lagi".PHP_EOL;

}