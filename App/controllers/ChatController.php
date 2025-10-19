<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/ChatModel.php';

class ChatController extends BaseController {

    public function index() {
        $this->render('chat.view.php',['navFile' => $this->navFile]);
    }

    public function getMessagesList() {
        $listaChats = ChatModel::getChatsList($_SESSION['user_id']);
        header('Content-Type: application/json');
        echo json_encode($listaChats);
        exit;
    }

    public function loadConversation($idComerciante) {
        $mensajes = ChatModel::getChatMessages($_SESSION['user_id'], $idComerciante);
        header('Content-Type: application/json');
        echo json_encode($mensajes);
        exit;
    }
}
