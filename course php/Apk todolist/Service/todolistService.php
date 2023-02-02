<?php
namespace Service {

    use Entity\Todolist;
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
        public function __construct(TodolistRepository $todoListRepository)
        {
            $this->todoListRepository = $todoListRepository;
        }
        function showTodolist(): void
        {

            echo "TODOLIST" . PHP_EOL;
            $todolist = $this->todoListRepository->findAll();
            foreach ($todolist as $number => $value) {
                echo "$number." . $value->getTodo() . PHP_EOL;
            }
        }
        function addTodolist(string $todo): void
        {
            $todolist = new Todolist($todo);
            $this->todoListRepository->save($todolist);
            echo "sukses menambah todolist" . PHP_EOL;
        }
        function removeTodolist(int $number): void
        {
            if ($this->todoListRepository->remove($number)) {
                echo "sukses menghapus todolist" . PHP_EOL;
            } else {
                echo "gagal menghapus todolist" . PHP_EOL;
            }

        }
    }
}