<?php
require_once __DIR__ . '/Database.php';

class AccountModel {

    public static function getAll() {
    }

    public static function getUserRol($userId) {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT tipo FROM usuarios WHERE id = :id");
        $stmt->execute(['id' => $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getAccountInfo($userID) {
        $con = Database::getConnection();
        $sql = "SELECT Nombre, Apellidos, Email, num_Tel, UserImagePath
                    FROM usuarios
                    WHERE id = :userID
        ";
        $stmt = $con->prepare($sql);
        $dato = ['userID' => $userID];
        $stmt->execute($dato);

        $accountInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $accountInfo;
    }

    public static function getUserProfileImage($userId) {
        $con = Database::getConnection();
        $sql = "SELECT UserImagePath FROM usuarios WHERE id = :userID";
        $stmt = $con->prepare($sql);
        $dato = ['userID' => $userId];
        $stmt->execute($dato);

        $userImagePath = $stmt->fetch(PDO::FETCH_ASSOC);
        return $userImagePath;
    }

    public static function getUserList() {
        $con = Database::getConnection();
        $sql = "SELECT id, Nombre, Apellidos, Email, num_Tel, Tipo
                    FROM usuarios
                    WHERE NOT(Tipo = 'administrador')
        ";
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $userList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $userList;
    }

    public static function saveUserInfo($nombre, $apellidos, $email, $telefono, $userID) {
        $con = Database::getConnection();
        $sql = "UPDATE usuarios SET Nombre = :nombre, Apellidos = :apellidos,
                    Email = :email, num_Tel = :telefono
                    WHERE id = :idUsuario
                ";
        $stmt = $con->prepare($sql);
        $dato = [
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'email' => $email,
            'telefono' => $telefono,
            'idUsuario' => $userID
        ];
        $stmt->execute($dato);
    }

    public static function saveUserImagePath($filepath, $userID) {
        $con = Database::getConnection();
        $sql = "UPDATE usuarios
            SET userImagePath = :userImagePath
            WHERE id = :userID";

        $stmt = $con->prepare($sql);
        $dato = ['userImagePath' => $filepath, 'userID' => $userID];
        $stmt->execute($dato);
    }

    public static function saveUserPasswd($newPasswd, $userID) {
        $con = Database::getConnection();
        $sql = "UPDATE usuarios
                SET Contrasenna = :newPasswd
                WHERE id = :userID
            ";

        $stmt = $con->prepare($sql);
        $dato = ['newPasswd' => $newPasswd, 'userID' => $userID];
        $stmt->execute($dato);
    }

    public static function getCurrentPasswd($userID) {
        $con = Database::getConnection();
        $sql = "SELECT Contrasenna FROM usuarios WHERE id = :userID";
        $stmt = $con->prepare($sql);
        $stmt->execute(['userID' => $userID]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function deleteUser($userID) {
        $con = Database::getConnection();
        $sql = "DELETE FROM usuarios WHERE id = :userID";
        $stmt = $con->prepare($sql);
        $stmt->execute(['userID' => $userID]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
