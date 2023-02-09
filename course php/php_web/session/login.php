<?php
session_start();
if(isset($_SESSION['login'])){
    header('location: member.php');
    exit();
}
$error = '';

if($_SERVER['REQUEST_METHOD'] ==  "POST"){
    if($_POST['username'] == "daud" && $_POST['password']== 'daud'){
        $_SESSION['login'] = true;
        $_SESSION['username'] = 'daud';
        header('location: member.php');
        exit();
    }else{
        $error = "Login Gagal ";
    }
}

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
<?php if ($error != ""):?>
<h2><?php echo $error.PHP_EOL?></h2>
<?php endif;?>

<h1>login</h1>
<form action="" method="post">
    <label >username:
        <input type="text" name="username">
    </label>
    <br>
    <label>password
        <input type="text" name="password">
    </label>
    <br>
    <input type="submit" value="login">
</form>
</body>
</html>
