<?php
require_once __DIR__ . "/exception/validationException.php";
require_once __DIR__ . "/data/loginRequest.php";
require_once __DIR__ . "/helper/validation.php";

$loginRequest = new loginRequest();
// $loginRequest->username = "daud";
// $loginRequest->password = "hidayat";
// try{
//     validateLoginRequest($loginRequest);
// }catch(ValidationException $e){
//     echo $e->getMessage();
// } catch (Exception $e) {
//     echo $e->getMessage();
// }

try {
    validateLoginRequest($loginRequest);
} catch (ValidationException | Exception $e) {
    echo "error : {$e->getMessage()}" . PHP_EOL;
    // var_dump($e->getTrace());
    echo $e->getTraceAsString().PHP_EOL;
}Finally {
    echo "ERROR tidak akan di eksekusi" . PHP_EOL;
}