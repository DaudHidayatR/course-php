<?php
require_once __DIR__ . '/getConnection.php';

$conn = getConnection();
$conn->beginTransaction();

$conn->exec("INSERT INTO comments(email, comment) VALUES('juan@gmail.com', 'test')");
$conn->exec("INSERT INTO comments(email, comment) VALUES('zahwa@gmail.com', 'test1')");
$conn->exec("INSERT INTO comments(email, comment) VALUES('bintang@gmail.com', 'test2')");
$conn->exec("INSERT INTO comments(email, comment) VALUES('bulan@gmail.com', 'test3')");

$conn->rollBack();

$conn = null;


?>