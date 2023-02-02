<?php
$conn = new PDO("mysql:host=$host:$port;dbname=$database", $username, $password);
    echo "database berhasil terkoneksi" . PHP_EOL;

    // menutup connection
    $conn = null;