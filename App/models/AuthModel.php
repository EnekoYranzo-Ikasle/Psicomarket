<?php
require_once __DIR__ . '/Database.php';

class AuthModel {

    public static function login($email) {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT id, Contrasenna FROM usuarios WHERE Email = :email");
        $data = ["email" => $email];
        $stmt->execute($data);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function createAccount($nombre, $apellidos, $phoneNumber, $Email, $Passwd, $Rol) {
        $db = Database::getConnection();
        $stmt = $db->prepare("INSERT INTO usuarios (Nombre, Apellidos, Email, Contrasenna, num_Tel, Tipo)
                                VALUES (:nombre, :apellidos, :email, :passwd, :phoneNumber, :rol)
        ");
        $data = ["nombre" => $nombre, "apellidos" => $apellidos, "email" => $Email, "passwd" => $Passwd, "phoneNumber" => $phoneNumber, "rol" => $Rol];
        $stmt->execute($data);
    }
}
