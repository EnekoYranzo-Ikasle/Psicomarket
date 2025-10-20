<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/LoginRegisterModel.php';

class LoginController extends BaseController
{

    public function index()
    {
        $this->render('login.view.php',['navFile' => $this->navFile]);
    }


    public function userLogin()
    {
        $user = LoginRegisterModel::getUser($_POST['userName']);

        if ($user) {
            if ($user['Contrasenna'] === $_POST['userPasswd']) {
                $_SESSION['user_id'] = $user['id'];
                $this->redirect('index.php');
            } else {
                $error = 'La contraseña introducida no existe para este usuario';
            }
        } else {
            $error = 'El usuario introducido no existe';
        }
        $this->render('login.view.php', ['error' => $error]);
    }

    public function show()
    {
    }

    public function store()
    {
    }

    public function destroy()
    {
    }

    public function destroyAll()
    {
    }
}
