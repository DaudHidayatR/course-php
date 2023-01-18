<?php
namespace Repository{
    use Entity\Todolist;
    interface TodolistRepository{
        function save(Todolist $todolist): void;
        function remove(int $number): bool;
        function findAll(): array;
    }
    class TodolistRepositorImpl implements TodolistRepository{
        public array $todolist = array();
        function save(Todolist $todolist): void{

        }
        function remove(int $number): bool{
            return false;;
        }
        function findAll(): array{
            return $this->todolist;
        }
    }
}