<?php 
require_once __DIR__.'/getConnection.php';

$conn = getConnection();
$conn->beginTransaction();

$conn->exec("INSERT INTO comments(email, comment) VALUES('daud28ramadhan@gmail.com', 'test')");
$conn->exec("INSERT INTO comments(email, comment) VALUES('daud28ramadhan@gmail.com', 'test1')");
$conn->exec("INSERT INTO comments(email, comment) VALUES('daud28ramadhan@gmail.com', 'test2')");
$conn->exec("INSERT INTO comments(email, comment) VALUES('daud28ramadhan@gmail.com', 'test3')");

$conn->commit();

$conn = null;


?>