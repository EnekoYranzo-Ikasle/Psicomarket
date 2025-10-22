<?php
require_once __DIR__ . '/Database.php';

class ComercioModel
{

    public static function getAll()
    {
        $con = Database::getConnection();
        $sql = "SELECT *FROM comercios"; //Escribimos la sentencia
        $stmt = $con->prepare($sql); //Preparamos la sentencia
        $stmt->execute(); //Ejecutamos las sentencia
        $comercios = $stmt->fetchAll(PDO::FETCH_ASSOC); //Guardamos los comercios en un array asociativo
        return $comercios; //retornamos comercios
    }

    public static function getAllMine()
    {
        $con = Database::getConnection();
        $sql = "SELECT * FROM comercios WHERE id_usuario = :propietario_id"; //Escribimos la sentencia
        $stmt = $con->prepare($sql); //Preparamos la sentencia
        $stmt->execute(['propietario_id' => $_SESSION['user_id']]); //Ejecutamos las sentencia
        $comercios = $stmt->fetchAll(PDO::FETCH_ASSOC); //Guardamos los comercios en un array asociativo
        return $comercios; //retornamos comercios
    }

    public static function getById($id)
    {
        $con = Database::getConnection();
        $sql = "SELECT * FROM comercios WHERE id=:id";
        $stmt = $con->prepare($sql);
        $dato = ['id' => $id]; //asociamos el id
        $stmt->execute($dato);

        $comercio = $stmt->fetch(PDO::FETCH_ASSOC);
        return $comercio;
    }

    public static function create($datos) {}

    public static function deleteById($id) {}

    public static function deleteAll() {}

    public static function getAllPatrocinated()
    {
        $con = Database::getConnection();
        $sql = "SELECT * FROM comercios WHERE patrocinado=1";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $comerciosPatrocinados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $comerciosPatrocinados;
    }

    public static function getCoords()
    {
        $con = Database::getConnection();
        $sql = "SELECT Nombre_comercio, Latitud, Longitud FROM comercios";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $comerciosCoords = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $comerciosCoords;
    }
    public static function getCoordsMiComercio($idUsuario)
    {
        $con = Database::getConnection();
        $sql = "SELECT Nombre_comercio, Latitud, Longitud FROM comercios Where id_usuario =:idUsuario";
        $stmt = $con->prepare($sql);
        $stmt->execute(['idUsuario' => $idUsuario]);
        $comerciosCoords = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $comerciosCoords;
    }
}
