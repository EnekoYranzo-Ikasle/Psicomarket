<?php
session_start();

// en index.php justo después de session_start()
error_log("Contenido de la sesión: " . print_r($_SESSION, true), 3, __DIR__ . "/debug.log");


require_once 'Router.php';

Router::dispatch();
?>

