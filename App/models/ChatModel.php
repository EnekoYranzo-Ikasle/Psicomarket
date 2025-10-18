<?php
require_once __DIR__ . '/Database.php';

class ChatModel {

    public static function getChatsList($idComprador) {
        $con = Database::getConnection();
        $sql = "SELECT c.id, c.comercioID, co.Nombre_comercio
                    FROM chat c
                    JOIN comercios co ON c.comercioID = co.id
                    WHERE c.usuarioID = :idComprador
                    ORDER BY c.id ASC;
                ";
        $stmt = $con->prepare($sql);
        $dato = ['idComprador' => $idComprador];
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
}
