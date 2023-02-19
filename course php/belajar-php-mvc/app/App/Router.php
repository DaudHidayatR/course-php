<?php
namespace Daudhidayatramadhan\BelajarPhpMvc\App;
class Router
{
    private static array $routers = [];
    public static function add(string $method,
                               string $path,
                               string $controller,
                               string $function):void
    {
        self::$routers[] = [
            'method' => $method,
            'path' => $path,
            'controller'=> $controller,
            'function' => $function
        ];
    }
    public static function run(): void
    {
        $path = '/';
        if(isset($_SERVER['PATH_INFO'])){
            $path = $_SERVER['PATH_INFO'];
        }
        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routers as $router ){
            $pattern = "#^". $router['path']."$#";
            if(preg_match($pattern, $path, $variables)&& $method == $router['method']){
                $function = $router['function'];
                $controller = new $router['controller'];
//                $controller->$function();
                array_shift($variables);

                call_user_func_array([$controller, $function], $variables);
                return;
            }
        }
        http_response_code(404);
        echo "CONTROLLER NOT FOUND";
    }
}