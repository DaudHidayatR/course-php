<?php
header("Application: Belajar PHP web");
header("Author : Daud Hidayat Ramadhan");



$client = $_SERVER['HTTP_CLIENT_NAME'];

echo "Hello $client";