<?php

class Router {

    public static function dispatch() {
        $controllerName = $_GET['controller'] ?? 'XxxxxController';
        $action = $_GET['accion'] ?? 'index';

        self::loadController($controllerName, $action);
    }

    private static function loadController($controllerName, $action) {
        $controllerFile = __DIR__ . "/controllers/{$controllerName}.php";
        require_once $controllerFile;

        $controller = new $controllerName();

        $controller->$action();
    }
}
