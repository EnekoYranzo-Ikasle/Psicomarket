<?php
require_once __DIR__ . '/Database.php';

class ChatModel {

    public static function getChatsList($idComprador) {
        $con = Database::getConnection();
        $sql = "SELECT DISTINCT c.id, c.Nombre_comercio
                    FROM psicomarket.mensajes m
                    JOIN psicomarket.comercios c ON m.id_Comerciante = c.id_usuario
                    WHERE m.id_Comprador = :idComprador;
                ";
        $stmt = $con->prepare($sql);
        $dato = ['idComprador' => $idComprador];
        $stmt->execute($dato);
        
        $listaChats = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $listaChats;
    }

    public static function getById($id) {
    }

    public static function create($datos) {
    }

    public static function deleteById($id) {
    }

    public static function deleteAll() {
    }
}
