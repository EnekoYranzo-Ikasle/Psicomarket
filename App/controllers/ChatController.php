<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/ChatModel.php';

class ChatController extends BaseController {

    public function index() {
        $this->render('chat.view.php', ['navFile' => $this->navFile]);
    }

    public function getMessagesList() {
        $userID = $_SESSION['user_id'];
        $userType = AccountModel::getUserRol($userID);

        if ($userType['tipo'] == 'usuario') {
            $listaChats = ChatModel::getUserChatsList($userID);
        } elseif ($userType['tipo'] == 'comerciante') {
            $listaChats = ChatModel::getVendorChatList($userID);
        }

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
