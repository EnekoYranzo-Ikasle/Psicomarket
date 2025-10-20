<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/ComercioModel.php';
require_once __DIR__ . '/../models/ProductoModel.php';

class ComercioController extends BaseController
{

    public function index()
    {
        $comerciosPatrocinados = ComercioModel::getAllPatrocinated();
        $comerciosAnunciados = ComercioModel::getAll();
        $comercioSeleccionado=$this-> seleccionarComercio();
        $this->render('index.view.php',
                 ['comerciosPatrocinados' => $comerciosPatrocinados,
                  'comerciosAnunciados' => $comerciosAnunciados,
                    'comercioSeleccionado' => $comercioSeleccionado,'navFile' => $this->navFile]
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
    $productosDelComercio= ProductoModel::getByComercioId($id);
    // Renderizar la vista infoComercio
    $this->render('infoComercio.view.php', [
        'comercio' => $comercio,
        'productosDelComercio' => $productosDelComercio,'navFile' => $this->navFile
    ]);
}

    public function coords()
    {
        $comerciosCoords = ComercioModel::getCoords();
    }
    public function apiGetComercios(){
        header('Content-Type: application/json');
       $comercios = ComercioModel::getAll();
        echo json_encode($comercios, JSON_UNESCAPED_UNICODE);
        exit;
    }


    public function show() {}

    public function store() {}

    public function destroy() {}

    public function destroyAll() {}
}
