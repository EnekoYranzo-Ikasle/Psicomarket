<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/ComercioModel.php';

class ComercioController extends BaseController {

    public function index() {
        $comerciosPatrocinados = ComercioModel::getAllPatrocinated();
        $comerciosAnunciados = ComercioModel::getAll();

        $this->render('index.view.php', ['comerciosPatrocinados' => $comerciosPatrocinados, 'comerciosAnunciados' => $comerciosAnunciados]);
    }

    public function coords() {
        $comerciosCoords = ComercioModel::getCoords();
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
