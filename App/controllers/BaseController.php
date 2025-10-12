<?php

class BaseController {

    protected function render($view, $data = []) {
        extract($data);

        require __DIR__ . "/../views/{$view}";
    }

    protected function redirect($url) {
        header("Location: {$url}");
        exit;
    }
}
