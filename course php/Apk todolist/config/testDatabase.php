<?php

require_once __DIR__ . '/Database.php';

$db = \Config\Database::getConnection();
echo " Koneksi ke database berhasil";