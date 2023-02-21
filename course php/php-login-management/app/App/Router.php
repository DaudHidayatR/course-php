<?php
namespace Daudhidayatramadhan\LoginManagement\App;
class Router
{
    private static array $routers = [];
    public static function add(string $method,
                               string $path,
                               string $controller,
                               string $function,
                               array $middlewares =[]):void
    {
        self::$routers[] = [
            'method' => $method,
            'path' => $path,
            'controller'=> $controller,
            'function' => $function,
            'middleware' => $middlewares
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

//                call middleware
                foreach ($router['middleware'] as $middleware){
                    $instance = new $middleware;
                    $instance->before();
                }

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