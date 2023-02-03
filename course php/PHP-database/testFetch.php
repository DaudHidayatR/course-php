<?php
require_once __DIR__ . '/getConnection.php';

$conn = getConnection();
$username = 'daud';
$password = 'admin';


$sql = "SELECT * FROM admin WHERE username = :username AND password = :password";
$prepare = $conn->prepare($sql);

$prepare->bindParam("username", $username);
$prepare->bindParam("password", $password);
$prepare->execute();

if($row = $prepare->fetch()){
    echo "Sukses Login : $username" . PHP_EOL;
}else{
    echo "Gagal Login ".PHP_EOL;
}
$conn = null;



?>