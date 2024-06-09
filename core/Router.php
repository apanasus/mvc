<?php

namespace Core;

class Router
{
    public function run()
    {
        $controllerName = 'Home';
        $actionName = 'index';

        $uri = trim($_SERVER['REQUEST_URI'], '/');

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
