<?php
namespace Entity {
    class Todolist
    {
        private int $id;
        private string $todo;

        public function __construct(string $todo = " ")
        {
            $this->todo = $todo;
        }

        public function getTodo()
        {
            return $this->todo;
        }
        public function setTodo($todo)
        {
            $this->todo = $todo;

            return $this;
        }
        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;

            return $this;
        }
    }

}