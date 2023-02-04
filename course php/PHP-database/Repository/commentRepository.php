<?php 
namespace repository{
    use Model\Comment;

    interface Commentrepository{
        function insert(Comment $comment): Comment;

        function findById(int $id): ?Comment;

        function findAll(): array;
    }
    class CommentrepositoryImpl implements Commentrepository
    {
        public function __construct(private \PDO $conn)
        {

        }

        public function insert (Comment $comment): Comment
        {
            $sql = "INSERT INTO comments (email, comment) values(?,  ?)";
            $statement = $this->conn->prepare($sql);
            $statement->execute([$comment->getEmail(), $comment->getComment()]);

            $id = $this->conn->lastInsertId();
            $comment->setId($id);
            return $comment;

        }
        public function findById(int $id): ?Comment
        {
            $sql = "SELECT * FROM comments WHERE id= ?";
            $statement = $this->conn->prepare($sql);
            $statement->execute([$id]);

            if($row = $statement->fetch()){
                return new Comment(
                    id: $row['id'],
                    email: $row['email'],
                    comment: $row['comment']);
            }else{
                return null;
            }
        }
        public function findAll(): array
        {
            $sql = "SELECT * FROM comments ";
            $statement = $this->conn->query($sql);
            $array = [];
            while($row= $statement->fetch()){

                $array[] = new Comment(
                    id: $row['id'],
                    email: $row['email'],
                    comment: $row['comment']);
            }
            return $array;
        }
    }
}


?>