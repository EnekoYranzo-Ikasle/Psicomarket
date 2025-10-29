<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/ValoracionModel.php';

class ValoracionController extends BaseController {

    public function index() {
        $this->render('index.view.php');
    }
}
