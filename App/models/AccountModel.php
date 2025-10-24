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
        $sql = "SELECT Nombre, Apellidos, Email, num_Tel
                    FROM usuarios
                    WHERE id = :userID
        ";
        $stmt = $con->prepare($sql);
        $dato = ['userID' => $userID];
        $stmt->execute($dato);

        $accountInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $accountInfo;
    }

    public static function saveUserImagePath($filepath) {
        $userID = $_SESSION['user_id'];

        $con = Database::getConnection();
        $sql = "UPDATE usuarios
            SET userImagePath = :userImagePath
            WHERE id = :userID";

        $stmt = $con->prepare($sql);
        $dato = ['userImagePath' => $filepath, 'userID' => $userID];
        $stmt->execute($dato);
    }
}
