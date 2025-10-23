<?php
require_once __DIR__ . '/Database.php';

class CategoriaModel
{

    public static function getAll()
    {
        $con = Database::getConnection();
        
            $sql = "SELECT * FROM categorias ORDER BY nombre ASC ";
            $stmt = $con->prepare($sql);
            $stmt->execute();
        $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $categorias;
    }

    public static function getById($id) {}

    public static function create($datos) {}

    public static function deleteById($id) {}

    public static function deleteAll() {}
}
