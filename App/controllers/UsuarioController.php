<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/UsuarioModel.php';

class UsuarioController extends BaseController {

    public function index() {
        $this->render('index.view.php');
    }


    public function getUserRol($userId){
        return UsuarioModel::getUserRol($userId);
    }

     public function getNav() {

        if(isset($_SESSION['user_id'])) {
            $tipoUsuario = $this->getUserRol($_SESSION['user_id']);

            switch($tipoUsuario['tipo']) {
                case 'usuario':
                    $navFile = 'navUsuario';
                    break;
                case 'comerciante':
                    $navFile = 'navComerciante';
                    break;
                default:
                    $navFile = 'navAnonimo';
            }
        }


        return $navFile ?? 'navAnonimo';
    }

    public function show() {
    }

    public function store() {
    }

    public function destroy() {
    }

    public function destroyAll() {
    }
}
