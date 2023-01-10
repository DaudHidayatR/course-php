<?php
require_once __DIR__ . "./../helper/input.php";
require_once __DIR__ . "./../BusinessLogic/RemoveTodoList.php";
function viewRemoveTodoList(){
    echo "MENGHAPUS TODO".PHP_EOL;

    $pilihan = input("nomor (x untuk membatalkan)");

    if ($pilihan === "x"){
        echo "batal menghapus todo".PHP_EOL;
    }else {
        $success = removeTodoList($pilihan);
        if ($success) {
            echo "Sukses Menghapus todo nomor $pilihan" . PHP_EOL;
        } else {
            echo "Gagal menghapus todo nomor $pilihan" . PHP_EOL;
        }
    }

}