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
            $controllerName = ucfirst(array_shift($segments));
            $actionName = array_shift($segments) ?: 'index'; // Default to 'index' if no action is specified
        }

        $controllerClass = "\\App\\Controllers\\{$controllerName}Controller";
        if (class_exists($controllerClass)) {
            $controller = new $controllerClass();
            if (method_exists($controller, $actionName)) {
                call_user_func_array([$controller, $actionName], []);
            } else {
                echo "Action {$actionName} not found";
            }
        } else {
            echo "Controller {$controllerName} not found";
        }
    }
}
