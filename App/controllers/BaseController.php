<?php
require_once __DIR__ . '/../models/AccountModel.php';

class BaseController {
    protected function render($view, $data = []) {
        if (isset($_SESSION['user_id'])) {
            $userProfileImage = AccountModel::getUserProfileImage($_SESSION['user_id']) ?? 'assets/images/icons/userLogo.png';

            // Determinar menú de navegacion según el rol del usuario actual
            $rol = AccountModel::getUserRol($_SESSION['user_id']);
            switch ($rol['tipo']) {
                case 'usuario':
                    $navFile = 'navUsuario';
                    break;
                case 'comerciante':
                    $navFile = 'navComerciante';
                    break;
                case 'administrador':
                    $navFile = 'navAdministrador';
                    break;
                default:
                    $navFile = 'navAnonimo';
            }
        } else {
            $userProfileImage = 'assets/images/icons/userLogo.png';
            $navFile = 'navAnonimo';
        }

        $data['navFile'] = $navFile;
        $data['userProfileImage'] = $userProfileImage;

        extract($data);

        require __DIR__ . "/../views/{$view}";
    }


    protected function redirect($url) {
        header("Location: {$url}");
        exit;
    }
}
