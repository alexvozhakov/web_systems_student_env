<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
class Router {
    
    private static $routes = array();

    private function __constructor() {}

    public static function get($pattern, $callback) {
        self::set('GET', $pattern, $callback);
    }

    public static function post($pattern, $callback) {
        self::set('POST', $pattern, $callback);
    }

    private static function set($type, $pattern, $callback) {
        if (!function_exists($callback)) { 
            new Exception("Method $callback not exists"); 
        }
        self::$routes[$type][$pattern] = $callback;
    }
    
    public static function process($method, $uri) {
       
        if (in_array($method, array('GET', 'POST'))) {
            new Exception("Request method should be GET or POST"); 
        }

        // Выполнение роутинга
        // Используем роуты $routes['GET'] или $routes['POST']  в зависимости от метода HTTP.
        $active_routes = self::$routes[$method];
        // Для всех роутов 
        //echo $uri;
        foreach ($active_routes as $pattern => $callback) {
            // Если REQUEST_URI соответствует шаблону - вызываем функцию
            if (preg_match("/$pattern/", $uri, $matches)) {
                //print_r($matches);
                unset($matches[0]);
                call_user_func_array($callback, $matches);
                // выходим из цикла
                break;
            }
            $matches = array();
        }
    }
}

        ?>
    </body>
</html>
