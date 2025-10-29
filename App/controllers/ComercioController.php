<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/ComercioModel.php';
require_once __DIR__ . '/../models/ProductoModel.php';
require_once __DIR__ . '/../models/CategoriaModel.php';
require_once __DIR__ . '/../models/ValoracionModel.php';

class ComercioController extends BaseController {

    public function index() {
        $comerciosPatrocinados = ComercioModel::getAllPatrocinated();
        $comerciosAnunciados = ComercioModel::getAll();
        $comercioSeleccionado = $this->seleccionarComercio();

        $categorias = CategoriaModel::getAll();
        $this->render(
            'index.view.php',
            [
                'comerciosPatrocinados' => $comerciosPatrocinados,
                'comerciosAnunciados' => $comerciosAnunciados,
                'comercioSeleccionado' => $comercioSeleccionado,
                'categorias' => $categorias
            ]
        );
    }

    public function seleccionarComercio() {
        $comercioSeleccionado = null;
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = (int) $_GET['id'];
            $comercioSeleccionado = ComercioModel::getById($id);
            return $comercioSeleccionado;
        }
        return null;
    }


    public function info() {
        if (!isset($_GET['id']) || empty($_GET['id'])) {
            die(" Falta el ID del comercio.");
        }

        $id = (int) $_GET['id'];
        $comercio = ComercioModel::getById($id);

        if (!$comercio) {
            die(" Comercio no encontrado.");
        }
        $productosDelComercio = ProductoModel::getByComercioId($id);
        // Renderizar la vista infoComercio
        $this->render('infoComercio.view.php', [
            'comercio' => $comercio,
            'productosDelComercio' => $productosDelComercio,
        ]);
    }

    public function getCoords() {
        $comerciosCoords = ComercioModel::getCoords();

        header('Content-Type: application/json');
        echo json_encode($comerciosCoords);
        exit;
    }


    public function apiGetComercios() {
        header('Content-Type: application/json');

        $busqueda = $_GET['busqueda'] ?? null;
        $valoracion = $_GET['valoracion'] ?? null;
        $cantidadProductos = $_GET['cantidadProductos'] ?? null;
        $categorias = $_GET['categorias'] ?? [];

        $comercios = ComercioModel::getAll($busqueda, $valoracion, $cantidadProductos, $categorias);

        foreach ($comercios as &$comercio) {
            $comercio['valoracion'] = ValoracionModel::getValoracionMedia($comercio['id']);
        }
        unset($comercio);

        echo json_encode($comercios, JSON_UNESCAPED_UNICODE);
        exit;
    }

    public function eliminarAnuncio() {
        header('Content-Type: application/json');
        $anuncio = $_GET['id'];
        $comerciante = $_SESSION['user_id'];
        $imagenComercio = ComercioModel::getImagenByAnuncioId($anuncio);
        $resultado = ComercioModel::eliminarAnuncio($anuncio, $comerciante);
        if ($resultado && $imagenComercio !== 'default.jpg') {
            $rutaImagen = $imagenComercio;
            if (file_exists($rutaImagen)) {
                unlink($rutaImagen);
            }
        }
        echo json_encode($resultado);
        exit;
    }

    public function editarAnuncio() {
        header('Content-Type: application/json');
        $input = file_get_contents("php://input");
        $datos = json_decode($input, true);

        $anuncioId = $_GET['id'];
        $nombre = $datos['nombre'];
        $descripcion = $datos['descripcion'];
        $resultado = ComercioModel::editarAnuncio($anuncioId, $nombre, $descripcion);
        echo json_encode($resultado);

        exit;
    }


    public function añadirAnuncio() {
        $nombre = $_POST['nombreAnuncio'];
        $descripcion = $_POST['descripcionAnuncio'];
        $lat = $_POST['lat'];
        $lon = $_POST['lon'];
        $comercianteId = $_SESSION['user_id'];

        $nombreArchivoFinal = 'default.jpg'; // Valor por defecto

        if (isset($_FILES['imagenComercio']) && $_FILES['imagenComercio']['error'] === UPLOAD_ERR_OK) {
            $imagenComercio = $_FILES['imagenComercio'];

            $nombreTemp = $imagenComercio['tmp_name'];
            $extension = pathinfo($imagenComercio['name'], PATHINFO_EXTENSION);

            $carpeta = "uploads/comercios/";

            $nombreArchivoFinal = uniqid('img_', true) . '.' . $extension;
            $rutaFinal = $carpeta . $nombreArchivoFinal;

            if (!move_uploaded_file($nombreTemp, $rutaFinal)) {
                die("Error al guardar la imagen.");
            }
        }

        $resultado = ComercioModel::añadirAnuncio($nombre, $descripcion, $lat, $lon, $comercianteId, $nombreArchivoFinal);

        if ($resultado) {
            header('Location: index.php?controller=ComercianteController');
            exit;
        } else {
            die("Error al añadir el anuncio.");
        }
    }
}
