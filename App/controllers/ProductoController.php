<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/ProductoModel.php';
require_once __DIR__ . '/../models/ImagenModel.php';

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
       $producto['rutas_imagenes']=$imagenes;

        $this->render('productoDetalles.view.php', [
            'producto' =>$producto,
            'navFile' => $this->navFile
        ]);
        } else{
            die ('Producto no encontrado');
        }
    }


    public function show() {}

    public function store() {}

    public function destroy() {}

    public function destroyAll() {}
}
