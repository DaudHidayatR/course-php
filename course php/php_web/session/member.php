<?php
session_start();

if(!isset($_SESSION['login'])){
    header('location: login.php');
    exit();
}
$say ="Hello ".$_SESSION['username'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1> <?= $say?></h1>
<a href="logout.php">logout</a>
</body>
</html>

