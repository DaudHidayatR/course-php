<?php
require_once __DIR__ . '/getConnection.php';

$conn = getConnection();
$username = 'daud';
$password = 'admin';


$sql = "SELECT * FROM admin WHERE username = ? AND password =?";
$prepare = $conn->prepare($sql);

$prepare->bindParam(1, $username);
$prepare->bindParam(2, $password);
$prepare->execute();

foreach ($prepare as $row) {
    $success = true;
    $find_user = $row['username'];
}
if ($success) {
    echo "sukses login : " . $find_user . PHP_EOL;
} else {
    echo "gaga login" . PHP_EOL;
}

$conn = null;



?>