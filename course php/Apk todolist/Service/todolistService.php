<?php
namespace Service {


    use Repository\TodolistRepository;
    interface TodolistService
    {
        function showTodolist(): void;
        function addTodolist(string $todo): void;
        function removeTodolist(int $number): void;
    }
    class TodolistServiceImpl implements TodolistService
    {
        private TodolistRepository $todoListRepository;
        public function __construct(TodolistRepository $todoListRepository){
            $this->todoListRepository = $todoListRepository;
        }
        function showTodolist(): void
        {

            echo "TODOLIST" . PHP_EOL;
            $todolist = $this->todoListRepository->findAll();
            foreach ( $todolist as $number => $value) {
                echo "$number. $value" . PHP_EOL;
            }
        }
        function addTodolist(string $todo): void
        {

        }
        function removeTodolist(int $number): void
        {

        }
    }
}

?>