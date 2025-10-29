<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/ComercioModel.php';
require_once __DIR__ . '/../models/ProductoModel.php';
require_once __DIR__ . '/../models/CategoriaModel.php';

class ComercianteController extends BaseController {

    public function index() {
        $comercios = ComercioModel::getAllMine();
        $this->render('misComercios.view.php', [
            'misComercios' => $comercios
        ]);
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

        $this->render('infoComercio.view.php', [
            'comercio' => $comercio
        ]);
    }

    public function getCoordsMiComercio() {
        $user = $_SESSION['user_id'];
        $comerciosCoords = ComercioModel::getCoordsMiComercio($user);

        header('Content-Type: application/json');
        echo json_encode($comerciosCoords);
        exit;
    }

    public function apiGetMisComercios() {
        header('Content-Type: application/json');
        $comercios = ComercioModel::getAllMine();
        echo json_encode($comercios, JSON_UNESCAPED_UNICODE);
        exit;
    }
}
