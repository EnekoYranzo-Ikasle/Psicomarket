<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/ProductoModel.php';
require_once __DIR__ . '/../models/ImagenModel.php';
require_once __DIR__ . '/../models/ComercioModel.php';

class ProductoController extends BaseController {

    public function index() {
        $this->render('index.view.php');
    }

    public function verificarProductoFavorito() {
        header('Content-Type: application/json');
        $producto = ProductoModel::verificarProductoFavorito($_GET['idProducto'], $_SESSION['user_id']) ? true : false;
        echo json_encode($producto);
        exit;
    }

    public function añadirEliminarFavorito() {
        header('Content-Type: application/json');

        $usuario = $_SESSION['user_id'];
        $productoID = $_GET['idProducto'];
        $esFavorito = filter_var($_GET['esFavorito'], FILTER_VALIDATE_BOOLEAN);
        if ($esFavorito === true) {
            $res = ProductoModel::eliminarFavorito($productoID, $usuario);
        } else {
            $res = ProductoModel::añadirFavorito($productoID, $usuario);
        }

        echo json_encode($res);
        exit;
    }
    public function getById(){
        if(isset($_GET['id'])){
        $id=$_GET['id'];
        $producto=ProductoModel::getById($id);
        $imagenes=ImagenModel::getByProductoId($id);
        $comercio =ComercioModel::getById($producto['id_comercio']);
        $categoria= ProductoModel::getCategoria($id);
        $this->render('productoDetalles.view.php', [
            'producto' =>$producto,
            'imagenes' => $imagenes,
            'comercio'=>$comercio,
            'categoria'=>$categoria,
            'navFile' => $this->navFile
        ]);
        } else{
            die ('Producto no encontrado');
        }
    }

    private function contarImagenes($cantidad) {
        switch (true) {
            case ($cantidad < 2):
                return 0;
            case ($cantidad >= 2 && $cantidad <= 4):
                return 1;
            case ($cantidad >= 5 && $cantidad <= 7):
                return 2;
            default:
                return 3;
        }
    }

    public function gestionarProductos() {
        $productosComercio = ProductoModel::getByComercioId($_GET['id']);
        $this->render('misProductos.view.php', ['productosComercio' => $productosComercio]);
    }

    public function obtenerProductos() {
        header('Content-Type: application/json');
        $productosComercio = ProductoModel::getByComercioId($_GET['comercioid']);
        echo json_encode($productosComercio);
        exit;
    }

    public function eliminar(){
        header('Content-Type: application/json');
        $productoID = $_GET['id'];

        $res = ProductoModel::eliminarProducto($productoID);
        echo json_encode($res);
        exit;
    }
    public function show() {}

    public function store() {}

    public function destroy() {}

    public function destroyAll() {}
}
