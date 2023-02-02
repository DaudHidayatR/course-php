<?php
require_once __DIR__ . '/getConnection.php';

$conn = getConnection();

$sql = <<<SQL
    INSERT INTO customers(id, name,email)
    VALUES('siraj','siraj','siraj@gmail.com');
    SQL;
    $conn->exec($sql);

    $conn= null;
?>