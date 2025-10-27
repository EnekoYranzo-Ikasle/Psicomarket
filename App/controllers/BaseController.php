<?php
require_once __DIR__ . '/../models/AccountModel.php';

class BaseController {

    protected $navFile = 'navAnonimo';

    protected function render($view, $data = []) {
        extract($data);

        if (isset($_SESSION['user_id'])) {
            $rol = AccountModel::getUserRol($_SESSION['user_id']);
            switch ($rol['tipo']) {
                case 'usuario':
                    $this->navFile = 'navUsuario';
                    break;
                case 'comerciante':
                    $this->navFile = 'navComerciante';
                    break;
                case 'administrador':
                    $this->navFile = 'navAdministrador';
                    break;
            }
        } else {
            $this->navFile = 'navAnonimo';
        }

        // actualizar la variable que ya fue extraída: re-defínela
        $navFile = $this->navFile;

        require __DIR__ . "/../views/{$view}";
    }

    protected function redirect($url) {
        header("Location: {$url}");
        exit;
    }
}
