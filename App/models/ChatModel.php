<?php
require_once __DIR__ . '/Database.php';

class ChatModel {

    public static function getUserChatsList($userID) {
        $con = Database::getConnection();
        $sql = "SELECT c.id, c.comercioID, co.Nombre_comercio AS nombreChat
                    FROM chat c
                    JOIN comercios co ON c.comercioID = co.id
                    WHERE c.usuarioID = :userID
                    ORDER BY c.id ASC;
                ";
        $stmt = $con->prepare($sql);
        $dato = ['userID' => $userID];
        $stmt->execute($dato);

        $listaChats = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $listaChats;
    }

    public static function getVendorChatList($comercianteID) {
        $con = Database::getConnection();
        $sql = "SELECT c.id, c.usuarioID, u.nombre AS nombreChat
            FROM chat c
            JOIN usuarios u ON c.usuarioID = u.id
            JOIN comercios com ON c.comercioID = com.id
            WHERE com.id_usuario = :comercianteID
            ORDER BY c.id ASC;
        ";
        $stmt = $con->prepare($sql);
        $dato = ['comercianteID' => $comercianteID];
        $stmt->execute($dato);

        $listaChats = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $listaChats;
    }

    public static function getChatMessages($chatID) {
        $con = Database::getConnection();
        $sql = "SELECT m.id, m.mensaje, m.fecha, m.userID, m.chatID,
                    u.Nombre AS nombre_usuario, u.Tipo AS tipo_usuario, co.Nombre_comercio
                FROM mensajes m
                JOIN usuarios u ON m.userID = u.id
                JOIN chat ch ON m.chatID = ch.id
                JOIN comercios co ON ch.comercioID = co.id
                WHERE m.chatID = :chatID
                ORDER BY m.fecha ASC;
        ";
        $stmt = $con->prepare($sql);
        $dato = ['chatID' => $chatID];
        $stmt->execute($dato);
        $mensajes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $mensajes;
    }

    public static function sendMessage($mensaje, $fecha, $userID, $chatID) {
        $con = Database::getConnection();
        $sql = "INSERT INTO mensajes (mensaje, fecha, userID, chatID)
                    VALUES (:mensaje, :fecha, :userID, :chatID)
        ";
        $stmt = $con->prepare($sql);
        $dato = ['mensaje' => $mensaje, 'fecha' => $fecha, 'userID' => $userID, 'chatID' => $chatID];
        $stmt->execute($dato);
    }

    public static function chatExiste($userID, $comercioID) {
        $con = Database::getConnection();
        $sql = "SELECT * FROM chat
            WHERE usuarioID = :userID AND comercioID = :comercioID
            LIMIT 1
        ";
        $stmt = $con->prepare($sql);
        $dato = ['userID' => $userID, 'comercioID' => $comercioID];
        $stmt->execute($dato);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function newChat($userID, $comercioID) {
        $con = Database::getConnection();
        $sql = "INSERT INTO chat (comercioID, usuarioID)
                    VALUES (:comercioID, :userID)
        ";
        $stmt = $con->prepare($sql);
        $dato = ['comercioID' => $comercioID, 'userID' => $userID];
        $stmt->execute($dato);
    }
}
