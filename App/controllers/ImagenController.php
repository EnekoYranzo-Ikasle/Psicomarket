<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/ImagenModel.php';

class ImagenController extends BaseController {

    public function index() {
        $this->render('index.view.php');
    }
}
