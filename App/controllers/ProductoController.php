<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/ProductoModel.php';

class ProductoController extends BaseController {

    public function index() {
        $this->render('index.view.php',['navFile' => $this->navFile]);
    }

    public function verificarProductoFavorito(){
        header('Content-Type: application/json');
        $producto = ProductoModel::verificarProductoFavorito($_GET['idProducto'],$_SESSION['id_user']);
        echo json_encode($producto);
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
