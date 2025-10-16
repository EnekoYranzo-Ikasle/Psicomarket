<?php
require_once __DIR__ . '/Database.php';

class LoginRegisterModel {

    public static function getUser($userName) {

        $data = ["Nombre_usuario" => $userName];

        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM usuarios WHERE Nombre_usuario = :Nombre_usuario");
        $stmt->execute($data);
        return $stmt->fetch(PDO::FETCH_ASSOC);
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
