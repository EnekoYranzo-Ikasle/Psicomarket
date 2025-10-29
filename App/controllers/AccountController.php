<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/AccountModel.php';

class AccountController extends BaseController {

    public function index() {
        $this->render('account.view.php', ['navFile' => $this->navFile]);
    }

    public function loadUserInfo($userID) {
        $accountInfo = AccountModel::getAccountInfo($userID);
        header('Content-Type: application/json');
        echo json_encode($accountInfo);
        exit;
    }

    public function getUserProfileImage($userID) {
        header('Content-Type: application/json');
        $imagePath = AccountModel::getUserProfileImage($userID);
        echo json_encode($imagePath);
        exit;
    }

    public function loadAdminTable() {
        $userList = AccountModel::getUserList();
        header('Content-Type: application/json');
        echo json_encode($userList);
        exit;
    }

    public function uploadUserImage() {
        header('Content-Type: application/json');

        $file = $_FILES['image'];
        $uploadDir = 'uploads/userImages/';
        $userID = $_SESSION['user_id'];

        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        if ($file['error'] !== UPLOAD_ERR_OK) {
            echo json_encode(['success' => false, 'message' => 'Error al subir la imagen']);
            exit;
        }

        $allowedTypes = ['image/jpeg', 'image/png'];
        if (!in_array($file['type'], $allowedTypes)) {
            echo json_encode(['success' => false, 'message' => 'Solo se permiten imágenes JPG o PNG']);
            exit;
        }

        $filename = basename($file['name']);
        $filepath = $uploadDir . $filename;

        if (move_uploaded_file($file['tmp_name'], $filepath)) {
            AccountModel::saveUserImagePath($filepath, $userID);
            echo json_encode(['success' => true, 'message' => 'Imagen guardada correctamente', 'imageUrl' => $filepath]);
        } else {
            echo json_encode(['success' => false, 'message' => 'No se pudo guardar la imagen']);
        }
    }

    public function saveUserInfo() {
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $userID = $_SESSION['user_id'];

        AccountModel::saveUserInfo($nombre, $apellidos, $email, $telefono, $userID);
    }

    public function saveUserPasswd() {
        header('Content-Type: application/json; charset=utf-8');

        $currentPasswdInput = $_POST['currentPasswd'] ?? '';
        $newPasswd = $_POST['newPasswd'] ?? '';
        $userID = $_SESSION['user_id'] ?? null;

        if (!$userID) {
            echo json_encode(['status' => 'error', 'msg' => 'Usuario no autenticado']);
            exit;
        }

        $userPasswd = AccountModel::getCurrentPasswd($userID);

        if (!$userPasswd || !isset($userPasswd['Contrasenna'])) {
            echo json_encode(['status' => 'error', 'msg' => 'No se pudo obtener la contraseña actual']);
            exit;
        }

        $currentHashedPasswd = $userPasswd['Contrasenna'];

        // Verificamos que la contraseña actual sea correcta
        if (!password_verify($currentPasswdInput, $currentHashedPasswd)) {
            echo json_encode(['status' => 'error', 'msg' => 'La contraseña actual no es correcta']);
            exit;
        }

        // Verificamos que la nueva contraseña NO sea igual a la actual
        if (password_verify($newPasswd, $currentHashedPasswd)) {
            echo json_encode(['status' => 'error', 'msg' => 'La nueva contraseña no puede ser igual a la actual']);
            exit;
        }

        $newHashedPasswd = password_hash($newPasswd, PASSWORD_DEFAULT);
        AccountModel::saveUserPasswd($newHashedPasswd, $userID);

        echo json_encode(['status' => 'ok', 'msg' => 'Contraseña actualizada correctamente']);
        exit;
    }

    public function  deleteUser($userID) {
        AccountModel::deleteUser($userID);
        echo json_encode(['status' => 'ok', 'msg' => 'Usuario borrado correctamente']);
        exit;
    }


    public function getUserRole() {
        header('Content-Type: application/json');
        $rol = AccountModel::getUserRol($_SESSION['user_id']);
        echo json_encode(['rol' => $rol]);
        exit;
    }
}
