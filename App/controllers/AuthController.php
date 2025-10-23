<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/AuthModel.php';

class AuthController extends BaseController {

    public function index() {
        $this->render('login.view.php', ['navFile' => $this->navFile]);
    }

    public function userLogin() {
        $user = AuthModel::login($_POST['email']);

        if ($user) {
            if ($user['Contrasenna'] === $_POST['userPasswd']) {
                $_SESSION['user_id'] = $user['id'];
                $this->redirect('index.php');
            } else {
                $error = 'La contraseña introducida no es correcta';
            }
            /* if (password_verify($_POST['userPasswd'], $user['Contrasenna'])) {
                $_SESSION['user_id'] = $user['id'];
                $this->redirect('index.php');
            } else {
                $error = 'La contraseña introducida no es correcta';
            } */
        } else {
            $error = 'El usuario introducido no existe';
        }
        $this->render('login.view.php', ['error' => $error]);
    }

    public function showLogin() {
        $this->render('login.view.php', ['navFile' => $this->navFile]);
    }

    public function showRegister() {
        $this->render('register.view.php', ['navFile' => $this->navFile]);
    }

    public function createAccount() {
        $nombre = $_POST['Name'];
        $apellidos = $_POST['LastName'];
        $phoneNumber = $_POST['PhoneNumber'];
        $Email = $_POST['Email'];
        $Passwd = password_hash($_POST['Passwd'], PASSWORD_DEFAULT);
        $Rol = $_POST['UserRol'];

        AuthModel::createAccount($nombre, $apellidos, $phoneNumber, $Email, $Passwd, $Rol);
    }
}
