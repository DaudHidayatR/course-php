<?php
namespace Repository {
    use Entity\Todolist;

    interface TodolistRepository
    {
        function save(Todolist $todolist): void;
        function remove(int $number): bool;
        function findAll(): array;
    }
    class TodolistRepositorImpl implements TodolistRepository
    {
        public array $todolist = array();

        private \PDO $conn;
        public function __construct(\PDO $conn)
        {
            $this->conn = $conn;
        }
        function save(Todolist $todolist): void
        {
            // $number = sizeof($this->todolist) + 1;
            // $this->todolist[$number] = $todolist;
            $sql = "Insert into todolist (todo) VALUES (?)";
            $statement = $this->conn->prepare($sql);
            $statement->execute([$todolist->getTodo()]);
        }
        function remove(int $number): bool
        {
            // if ($number > sizeof($this->todolist)) {
            //     return false;
            // }
            // for ($i = $number; $i < sizeof($this->todolist); $i++) {
            //     $this->todolist[$i] = $this->todolist[$i + 1];
            // }
            // unset($this->todolist[sizeof($this->todolist)]);
            // return true;
            $sql = "SELECT * FROM todolist WHERE id = ?";
            $statement = $this->conn->prepare($sql);
            $statement->execute([$number]);

            if ($statement->fetch()) {
                $sql = "DELETE FROM todolists WHERE id = ?";
                $statement = $this->conn->prepare($sql);
                $statement->execute([$number]);
                return true;
            }else {
                return false;
            }

        }
        function findAll(): array
        {
            return $this->todolist;
        }
    }
}