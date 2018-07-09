<?php

namespace App\Services\Router;

use App\Core\Request;

class Router
{
    private static $base_namespace_controller = "App\Controllers\\";
    private static $base_namespace_Middleware = "App\Middleware\\";

    private function __construct()
    {

    }

    public static function Register()
    {
        if (self::is_route_defined()) {
            if (!in_array(strtolower($_SERVER['REQUEST_METHOD']), self::get_router_method())){
                echo 'invalid request method';
                exit();
            }


            $request = new Request();
            $middelwerdClass = self::$base_namespace_Middleware.self::get_router_middleware(self::get_current_route());
            $middelwearInstance = new $middelwerdClass;
            $middelwearInstance->handel($request);


            list($controller,$method) = explode('@',self::get_router_target());
            $controllerClass =self::$base_namespace_controller.$controller;
            $controller_instance = new $controllerClass;
            if (method_exists($controller_instance, $method)){
                $controller_instance->$method();
            }else{
                echo 'invalid operation';
            }


        } else {
            echo 'page 404 not find ...';
        }

    }

    public static function get_current_route()
    {
        return strtok($_SERVER['REQUEST_URI'],"?");
    }

    public static function is_route_defined()
    {

        return array_key_exists(self::get_current_route(), self::get_routes());
    }

    public static function get_routes()
    {
        return include ROUTES . "web.php";
    }

    public static function get_router_target()
    {
        $routes = self::get_routes();
        $target_str = $routes[self::get_current_route()]['target'];
        return $target_str;
    }

    public static function get_router_method()
    {
        $routes = self::get_routes();
        $target_str = $routes[self::get_current_route()]['method'];
        $target_part = explode('|',$target_str);
        return $target_part;
    }

    public static function get_router_middleware()
    {
        $routes = self::get_routes();
        $target_str = $routes[self::get_current_route()]['middleware'];
        return $target_str ?? null;
    }
}
