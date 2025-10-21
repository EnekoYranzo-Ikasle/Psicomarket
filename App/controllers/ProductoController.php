<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/ProductoModel.php';

class ProductoController extends BaseController
{

    public function index()
    {
        $this->render('index.view.php', ['navFile' => $this->navFile]);
    }

    public function verificarProductoFavorito()
    {
        header('Content-Type: application/json');
        $producto = ProductoModel::verificarProductoFavorito($_GET['idProducto'], $_SESSION['user_id']) ? true : false;
        echo json_encode($producto);
        exit;
    }

    public function añadirEliminarFavorito()
    {
        header('Content-Type: application/json');

        $usuario = $_SESSION['user_id'];
        $productoID = $_GET['idProducto'];
        $esFavorito = $_GET['esFavorito'];

        if ($esFavorito) {
            $res = ProductoModel::eliminarFavorito($productoID, $usuario);
        } else {
            $res = ProductoModel::añadirFavorito($productoID, $usuario);
        }

        echo json_encode($res);
        exit;
    }


    public function show()
    {
    }

    public function store()
    {
    }

    public function destroy()
    {
    }

    public function destroyAll()
    {
    }
}
