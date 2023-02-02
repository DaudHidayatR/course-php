<?php
$host = "localhost";
$port = "3306";
$database = "belajar_php_database";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host:$port;dbname=$database", $username, $password);
    echo "database berhasil terkoneksi" . PHP_EOL;

    // menutup connection
    $conn = null;
} catch (PDOException $e) {
    echo "database gagal terkoneksi:".$e->getMessage() . PHP_EOL;
}