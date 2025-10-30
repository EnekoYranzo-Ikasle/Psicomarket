<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/ProductoModel.php';
require_once __DIR__ . '/../models/ImagenModel.php';
require_once __DIR__ . '/../models/ComercioModel.php';

class ProductoController extends BaseController
{

    public function index()
    {
        $this->render('index.view.php');
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
    public function getById()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = ProductoModel::getById($id);
            $imagenes = ImagenModel::getByProductoId($id);
            $comercio = ComercioModel::getById($producto['id_comercio']);
            $categoria = ProductoModel::getCategoria($id);
            $this->render('productoDetalles.view.php', [
                'producto' => $producto,
                'imagenes' => $imagenes,
                'comercio' => $comercio,
                'categoria' => $categoria,
            ]);
        } else {
            die('Producto no encontrado');
        }
    }

    private function contarImagenes($cantidad)
    {
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

    public function gestionarProductos()
    {
        $productosComercio = ProductoModel::getByComercioId($_GET['id']);
        $this->render('misProductos.view.php', ['productosComercio' => $productosComercio]);
    }

    public function obtenerProductos()
    {
        header('Content-Type: application/json');
        $productosComercio = ProductoModel::getByComercioId($_GET['comercioid']);
        echo json_encode($productosComercio);
        exit;
    }

    public function eliminar()
    {
        header('Content-Type: application/json');
        $productoID = $_GET['id'];

        $imagenProducto = ComercioModel::getImagenByProductoId($productoID);
        $res = ProductoModel::eliminarProducto($productoID);
        if ($res) {
            $rutaImagenes = $imagenProducto;
            foreach ($rutaImagenes as $img) {
                $ruta = $img['Ruta_imagen_producto'];
                if (file_exists($ruta)) {
                    unlink($ruta);
                }
            }
        }
        echo json_encode($res);
        exit;
    }

    public function obtenerCategorias()
    {
        header('Content-Type: application/json');
        $nombre = $_GET['nombre'] ?? '';

        $res = ProductoModel::obtenerCategorias($nombre);

        echo json_encode($res);
        exit;
    }

    public function añadirProducto()
    {
        $datos = [
            'idComercio' => $_POST['idComercio'] ?? '',
            'nombreProducto' => $_POST['nombreProducto'] ?? '',
            'descripcionProducto' => $_POST['descripcionProducto'] ?? '',
            'precioProducto' => $_POST['precioProducto'] ?? '',
            'id_categoria' => $_POST['id_categoria'] ?? ''
        ];

        $totalImagenes = count($_FILES['imagenes']['name']);
        for ($i = 0; $i < $totalImagenes; $i++) {
            $nombreTmp = $_FILES['imagenes']['tmp_name'][$i];
            $nombreArchivo = $_FILES['imagenes']['name'][$i];

            $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);

            $carpeta = "uploads/productos/";

            $nombreArchivoFinal = uniqid('img_', true) . '.' . $extension;
            $rutaFinal = $carpeta . $nombreArchivoFinal;

            if (!move_uploaded_file($nombreTmp, $rutaFinal)) {
                die("Error al guardar la imagen.");
            }
            $datos['imagenes'][] = $rutaFinal;
        }

        $res = ProductoModel::añadirProducto($datos);

        header('Location: index.php?controller=ProductoController&accion=gestionarProductos&id=' . $datos['idComercio']);
    }

    public function editarProducto()
    {
        header('Content-Type: application/json');
        $input = file_get_contents("php://input");
        $datos = json_decode($input, true);

        $datos = [
            'idProducto' => $_GET['id'],
            'nombre' => $datos['nombre'],
            'descripcion' => $datos['descripcion'],
            'precio' => $datos['precio']
        ];
        $resultado = ProductoModel::editarProducto($datos);
        echo json_encode($resultado);

        exit;
    }

    public function show() {}

    public function store() {}

    public function destroy() {}

    public function destroyAll() {}
}
