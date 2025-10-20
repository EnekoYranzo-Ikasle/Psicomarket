<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/LoginRegisterModel.php';

class RegisterController extends BaseController {

    public function index() {
        $this->render('register.view.php',['navFile' => $this->navFile]);
    }

    public function show() {
    }

    public function store() {
    }

    public function destroy() {
    }

    public function destroyAll() {
    }
}
