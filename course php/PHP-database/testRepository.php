<?php 
require_once __DIR__.'/GetConnection.php';
require_once __DIR__.'/Model/Comment.php';
require_once __DIR__.'/Repository/CommentRepository.php';
use repository\CommentrepositoryImpl;
use model\Comment;

$conn= getConnection();
$repository = new CommentrepositoryImpl ($conn);

$comment = new Comment(email: "repository@gmail.com", comment: "Hi");
$newcomment = $repository->insert($comment);

var_dump($newcomment->getId());


$allComment = $repository->findAll();
var_dump(($allComment));
$conn = null;

?>