<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/ComercioModel.php';
require_once __DIR__ . '/../models/ProductoModel.php';
require_once __DIR__ . '/../models/CategoriaModel.php';

class ComercioController extends BaseController
{

    public function index()
    {
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
                'categorias' => $categorias,
                'navFile' => $this->navFile
            ]
        );
    }

    public function seleccionarComercio()
    {
        $comercioSeleccionado = null;
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = (int) $_GET['id'];
            $comercioSeleccionado = ComercioModel::getById($id);
            return $comercioSeleccionado;
        }
        return null;
    }


    public function info()
    {
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
            'navFile' => $this->navFile
        ]);
    }

    public function getCoords()
    {
        $comerciosCoords = ComercioModel::getCoords();

        header('Content-Type: application/json');
        echo json_encode($comerciosCoords);
        exit;
    }


    public function apiGetComercios()
    {
        header('Content-Type: application/json');

        $busqueda = $_GET['busqueda'] ?? null;
        $valoracion = $_GET['valoracion'] ?? null;
        $cantidadProductos = $_GET['cantidadProductos'] ?? null;
        $categorias = $_GET['categorias'] ?? [];

        $comercios = ComercioModel::getAll($busqueda, $valoracion, $cantidadProductos, $categorias);
        echo json_encode($comercios, JSON_UNESCAPED_UNICODE);
        exit;
    }

    public function eliminarAnuncio(){
        header('Content-Type: application/json');
        $anuncio = $_GET['id'];
        $comerciante = $_SESSION['user_id'];
        $resultado = ComercioModel::eliminarAnuncio($anuncio, $comerciante);
        echo json_encode($resultado);
        exit;
    }

    public function editarAnuncio(){
        header('Content-Type: application/json');
        $anuncioId = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $resultado = ComercioModel::editarAnuncio($anuncioId, $nombre, $descripcion);
        echo json_encode($resultado);
        exit;
    }


    public function show() {}

    public function store() {}

    public function destroy() {}

    public function destroyAll() {}
}
