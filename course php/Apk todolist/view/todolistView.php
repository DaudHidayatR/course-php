<?php
namespace View{
use Entity\Todolist;
use Service\TodolistService;
use Helper\InputHelper;
    class TodoLIstView
    {
        private TodolistService $todolistService;

        public function __construct(TodolistService $todolistService){
            $this->todolistService = $todolistService;
        }
        function showTodolist(): void
        {
            while (true) {
                $this->todolistService->showTodoList();
                echo "MENU" . PHP_EOL;
                echo "1. Tambah Todo" . PHP_EOL;
                echo "2. Hapus Todo" . PHP_EOL;
                echo "x. keluar" . PHP_EOL;

                $pilihan = InputHelper::input("pilih");
                if ($pilihan == "1") {
                    $this->addTodolist();
                } else if ($pilihan == "2") {
                    $this->removeTodolist();
                } else if ($pilihan == "x") {
                    break;
                } else {
                    echo "pilihan anda salah, silahkan masukaan ulang" . PHP_EOL;
                }
            }
            echo "sampai jumpa lagi" . PHP_EOL;
        }function addTodolist(): void{

        }
        function removeTodolist(): void
        {
            
        }
    }
}