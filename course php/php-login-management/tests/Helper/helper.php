<?php

namespace Daudhidayatramadhan\LoginManagement\App{
    function header(string $value)
    {
        echo $value;
    }
}
namespace  Daudhidayatramadhan\LoginManagement\Service{
    function setcookie(string $name, $value) {
        echo "$name: $value";
    }
}