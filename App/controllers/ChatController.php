<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/ChatModel.php';

class ChatController extends BaseController {

    public function index() {
        $this->render('chat.view.php');
    }

    public function getMessagesList() {
        $listaChats = ChatModel::getChatsList($_SESSION['user_id']);
        header('Content-Type: application/json');
        echo json_encode($listaChats);
        exit;
    }

    public function loadConversation($chatID) {
        $mensajes = ChatModel::getChatMessages($chatID);

        header('Content-Type: application/json');
        echo json_encode($mensajes);
        exit;
    }

    public function sendMessage() {
        $mensaje = $_POST['mensaje'];
        $fecha = $_POST['fecha'];
        $userID = $_POST['userID'];
        $chatID = $_POST['chatID'];

        ChatModel::sendMessage($mensaje, $fecha, $userID, $chatID);
    }
}
