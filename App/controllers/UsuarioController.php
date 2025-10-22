<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/UsuarioModel.php';

class UsuarioController extends BaseController {

    public function index() {
        $this->render('index.view.php',['navFile' => $this->navFile]);
    }

    public function getUserRole() {
        header('Content-Type: application/json');
        $rol = UsuarioModel::getUserRol($_SESSION['user_id']);
        echo json_encode(['rol' => $rol]);
        exit;
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
