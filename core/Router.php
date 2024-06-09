<?php

namespace Core;

class Router
{
    public function run()
    {
        $controllerName = 'HomeController';
        $actionName = 'index';

        $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

        if ($uri) {
            $segments = explode('/', $uri);
            $controllerName = ucfirst(str_replace('_', '', array_shift($segments))) . 'Controller';
            $actionName = array_shift($segments) ?: 'index';
            $params = $segments;
        } else {
            $params = [];
        }

        $controllerClass = "\\App\\Controllers\\{$controllerName}";
        if (class_exists($controllerClass)) {
            $controller = new $controllerClass();
            if (method_exists($controller, $actionName)) {
                call_user_func_array([$controller, $actionName], $params);
            } else {
                echo "Action {$actionName} not found";
            }
        } else {
            echo "Controller {$controllerName} not found";
        }
    }
}
