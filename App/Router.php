<?php

class Router {

    public static function dispatch() {
        $controllerName = $_GET['controller'] ?? 'ComercioController';
        $action = $_GET['accion'] ?? 'index';

        self::loadController($controllerName, $action);
    }

    private static function loadController($controllerName, $action) {
        $controllerFile = __DIR__ . "/controllers/{$controllerName}.php";
        require_once $controllerFile;

        $controller = new $controllerName();

        // Quitar 'controller' y 'accion' de los parámetros GET
        $params = $_GET;
        unset($params['controller'], $params['accion']);

        // Llamar al método con los parámetros restantes
        $controller->$action(...array_values($params));
    }
}
