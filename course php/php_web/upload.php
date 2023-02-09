<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $FILE_name = $_FILES['uploadFile']['name'];
    $FILE_type = $_FILES['uploadFile']['type'];
    $FILE_size = $_FILES['uploadFile']['size'];
    $FILE_tmp_name = $_FILES['uploadFile']['tmp_name'];
    $FILE_error = $_FILES['uploadFile']['error'];

    move_uploaded_file($FILE_tmp_name, __DIR__.'/file/'.$FILE_name);
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
<?php if($_SERVER['REQUEST_METHOD'] == 'POST'):?>
    <table>
        <tr>
            <td>File name</td>
            <td><?= $FILE_name?></td>
        </tr>
        <tr>
            <td>File type</td>
            <td><?= $FILE_type ?></td>
        </tr>
        <tr>
            <td>File size</td>
            <td><?= $FILE_size ?></td>
        </tr>
        <tr>
            <td>File tmp name</td>
            <td><?= $FILE_tmp_name ?></td>
        </tr>
        <tr>
            <td>File error</td>
            <td><?php echo $FILE_error ?></td>
        </tr>
    </table>
<?php endif?>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <label>File
        <input type="file" name="uploadFile">
    </label>
    <br>
    <input type="submit" value="upload">
</form>
</body>
</html>