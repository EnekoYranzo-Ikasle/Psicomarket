<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/FavoritoModel.php';

class FavoritosController extends BaseController {

    public function index() {
        $favoritos = FavoritoModel::getAll($_SESSION['user_id']);
        $this->render('misFavoritos.view.php', ['favoritos' => $favoritos]);
    }

    public function apiGetFavoritos()
    {
        header('Content-Type: application/json');
        echo FavoritoModel::getAll($_SESSION['user_id']); // Devuelve JSON
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
