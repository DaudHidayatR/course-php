<?php 
require_once __DIR__ .'/getConnection.php';
$conn = getConnection();
$username = $conn->quote("daud'; #");
$password = $conn->quote("apa aja");
$sql = "SELECT * FROM admin WHERE username= $username AND password= $password;";

$statement = $conn->query($sql);

$success = false;
$find_user = null;
foreach ($statement as $row){
    $success = true;
    $find_user = $row['username'];
}
if($success){
    echo "sukses login : " . $find_user . PHP_EOL;
}else{
    echo "gaga login" . PHP_EOL;
}
$conn = null;
?>