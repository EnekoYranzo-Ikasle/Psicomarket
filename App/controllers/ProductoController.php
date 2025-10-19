<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/ProductoModel.php';

class ProductoController extends BaseController {

    public function index() {
        $this->render('index.view.php',['navFile' => $this->navFile]);
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
