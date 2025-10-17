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

    public static function getChatMessages($idComprador, $idComerciante) {
        $con = Database::getConnection();
        $sql = "SELECT m.id, m.Mensaje, m.Fecha, m.Hora, m.id_Comprador, m.id_Comerciante, u.Nombre AS nombre_comprador, c.Nombre_comercio AS nombre_comercio
                        FROM psicomarket.mensajes AS m
                        JOIN psicomarket.usuarios AS u ON m.id_Comprador = u.id
                        JOIN psicomarket.comercios AS c ON m.id_Comerciante = c.id_usuario
                        WHERE m.id_Comprador = :idComprador
                            AND m.id_Comerciante = :idComerciante
                            ORDER BY m.Fecha ASC, m.Hora ASC
                    ";
        $stmt = $con->prepare($sql);
        $dato = ['idComprador' => $idComprador, 'idComerciante' => $idComerciante];
        $stmt->execute($dato);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
