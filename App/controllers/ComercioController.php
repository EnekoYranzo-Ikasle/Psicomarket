<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/ComercioModel.php';

class ComercioController extends BaseController {

    public function index() {
        $comercios = ComercioModel::getAllPatrocinated();
        $this->render('index.view.php', ['comercios' => $comercios]);
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
