<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/UsuarioModel.php';

class UsuarioController extends BaseController {

    public function index() {
        $this->render('index.view.php');
    }

     public function getNav($rol) {

        if(isset($_SESSION['user_id'])) {

            switch($rol) {
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
