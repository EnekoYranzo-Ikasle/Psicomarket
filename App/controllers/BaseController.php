<?php
require_once __DIR__ . '/../models/UsuarioModel.php';

class BaseController {

    protected function render($view, $data = []) {
        extract($data);

        $navFile = 'navAnonimo';
        if(isset($_SESSION['user_id'])) {
            $rol = UsuarioModel::getUserRol($_SESSION['user_id']);
            switch($rol) {
                case 'usuario':
                    $this->$navFile = 'navUsuario';
                    break;
                case 'comerciante':
                    $this->$navFile = 'navComerciante';
                    break;
                default:
                    $this->$navFile = 'navAnonimo';
            }
        }

        require __DIR__ . "/../views/{$view}";
    }

    protected function redirect($url) {
        header("Location: {$url}");
        exit;
    }
}
