<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/ValoracionModel.php';
require_once __DIR__ . '/../models/ComercioModel.php';

class ValoracionController extends BaseController
{

    public function index()
    {
        $this->render('index.view.php');
    }

    public function insertValoration()
    {
        header('Content-Type: application/json');
        
        if (!isset($_SESSION['user_id'])) {
            echo json_encode(['error' => 'Debes iniciar sesión para valorar']);
            return;
        }
        
        $idUsuario = $_SESSION['user_id'];
        $idComercio = $_POST['idComercio'] ?? null;
        $estrellas = $_POST['estrellas'] ?? null;
        
        // Validar que existan los datos necesarios
        if (!$idComercio || !$estrellas) {
            echo json_encode(['error' => 'Faltan datos necesarios']);
            return;
        }
        
        // Verificar si ya valoró este comercio
        if (ValoracionModel::yaValorado($idUsuario, $idComercio)) {
            echo json_encode(['error' => 'Ya has valorado este comercio']);
            return;
        }

        // Verificar que el comercio existe
        $comercio = ComercioModel::getById($idComercio);
        if (!$comercio) {
            echo json_encode(['error' => 'El comercio no existe']);
            return;
        }
        
        // Verificar que no es el dueño del comercio
        if ($comercio['id_usuario'] === $idUsuario) {
            echo json_encode(['error' => 'No puedes valorar tu propio comercio']);
            return;
        }
        
        // Insertar la valoración
        $resultado = ValoracionModel::create($estrellas, $idUsuario, $idComercio);
        
        exit;
    }
}