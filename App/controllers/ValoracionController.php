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
        
        $idUsuario = $_SESSION['user_id'];
        $idComercio = $_POST['idComercio'] ?? null;
        $estrellas = $_POST['estrellas'] ?? null;
        
       
        if (!$idComercio || !$estrellas) {
            echo json_encode(['error' => 'Faltan datos necesarios']);
            return;
        }
        
       
        if (ValoracionModel::yaValorado($idUsuario, $idComercio)) {
            echo json_encode(['error' => 'Ya has valorado este comercio']);
            return;
        }

       
        $comercio = ComercioModel::getById($idComercio);
        if (!$comercio) {
            echo json_encode(['error' => 'El comercio no existe']);
            return;
        }
        
        
        if ($comercio['id_usuario'] === $idUsuario) {
            echo json_encode(['error' => 'No puedes valorar tu propio comercio']);
            return;
        }
        
       
        ValoracionModel::create($estrellas, $idUsuario, $idComercio);
        
         echo json_encode(['success' => '¡Gracias por tu valoración!']);
        exit;
    }
}