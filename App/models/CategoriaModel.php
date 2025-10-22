<?php
require_once __DIR__ . '/Database.php';

class CategoriaModel
{

    public static function getAll($busqueda = null)
    {
        $con = Database::getConnection();

        if ($busqueda) {
            $busqueda = "%$busqueda%";
            $sql = "SELECT * FROM comercios 
            WHERE Nombre_comercio LIKE :busqueda";
            $stmt = $con->prepare($sql);
            $dato = ['busqueda', $busqueda];
            $stmt->execute($dato);
        } else {
            $sql = "SELECT * FROM categorias ORDER BY nombre ASC ";
            $stmt = $con->prepare($sql);
        }
        $stmt->execute();

        $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $categorias;
    }

    public static function getById($id) {}

    public static function create($datos) {}

    public static function deleteById($id) {}

    public static function deleteAll() {}
}
