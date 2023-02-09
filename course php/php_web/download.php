<?php
if(isset($_GET['key'])&& $_GET['key']=='rahasia'){
    header('Content-Disposition: attachment; filename = "Gambar.png"');
    header('Content-Type: image/png');
    readfile(__DIR__. '/file/Image20230205150615.png');
    exit();
}else{
    echo 'gagal';
}