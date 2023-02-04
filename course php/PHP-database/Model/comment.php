<?php
namespace Model{

    class Comment
    {
        public function __construct(private ?int $id= null,
                                    private ?string $email=null,
                                    private ?string $comment=null)
        {
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

        public function getEmail()
        {
            return $this->email;
        }

        public function setEmail($email)
        {
            $this->email = $email;

            return $this;
        }
        public function getComment()
        {
            return $this->comment;
        }

        public function setComment($comment)
        {
            $this->comment = $comment;

            return $this;
        }

    }




}



?>