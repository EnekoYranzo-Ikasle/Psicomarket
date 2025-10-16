<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/ChatModel.php';

class ChatController extends BaseController {

    public function index() {
        $listaChats = ChatModel::getChatsList($_SESSION['user_id']);
        $this->render('chat.view.php', ['listaChats' => $listaChats]);
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
