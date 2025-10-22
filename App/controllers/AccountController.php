<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/AccountModel.php';

class AccountController extends BaseController
{

    public function index()
    {
        $this->render('account.view.php', ['navFile' => $this->navFile]);
    }

    public function loadUserInfo($userID)
    {
        $accountInfo = AccountModel::getAccountInfo($userID);
        header('Content-Type: application/json');
        echo json_encode($accountInfo);
        exit;
    }

    public function uploadUserImage()
    {
        header('Content-Type: application/json');

        $file = $_FILES['image'];
        $uploadDir = __DIR__ . 'uploads/userImages/';

        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        if (!is_writable($uploadDir)) {
            echo json_encode([
                'success' => false,
                'error' => 'No se puede escribir en la carpeta uploads'
            ]);
            exit;
        }

        if ($file['error'] !== UPLOAD_ERR_OK) {
            echo json_encode(['success' => false, 'message' => 'Error al subir la imagen']);
            exit;
        }

        /* $allowedTypes = ['image/jpeg', 'image/png'];
        if (!in_array($file['type'], $allowedTypes)) {
            echo json_encode(['success' => false, 'message' => 'Solo se permiten imágenes JPG o PNG']);
            exit;
        } */

        $filename = basename($file['name']);
        $filepath = $uploadDir . $filename;

        if (move_uploaded_file($file['tmp_name'], $filepath)) {
            AccountModel::saveUserImagePath($filepath);
            echo json_encode(['success' => true, 'message' => 'Imagen guardada correctamente']);
        } else {
            echo json_encode(['success' => false, 'message' => 'No se pudo guardar la imagen']);
        }
    }

    public function getUserRole()
    {
        header('Content-Type: application/json');
        $rol = AccountModel::getUserRol($_SESSION['user_id']);
        echo json_encode(['rol' => $rol]);
        exit;
    }
}
