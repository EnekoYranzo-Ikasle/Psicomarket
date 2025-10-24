<?php
require_once __DIR__ . '/Database.php';

class ValoracionModel {

    public static function getAll() {
    }
    public static function getValoracionMedia($idComercio)
    {
        $con = Database::getConnection();
        $sql = "SELECT IFNULL(AVG(estrellas), 0) AS media
                FROM valoraciones
                WHERE id_comercio = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$idComercio]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado ? round($resultado['media'], 1) : 0;
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
