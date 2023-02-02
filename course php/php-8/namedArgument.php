<?php
function sayHello(string $first, string $middle =" ", string $last):void{
    echo "hellp $first $middle $last".PHP_EOL;

}
SayHello("daud","hidayat","ramadhan");

// sayHello(last: "daud",first:"hidayat",middle:"ramadhan");

// SayHello(first: "daud", last: "hidayat");