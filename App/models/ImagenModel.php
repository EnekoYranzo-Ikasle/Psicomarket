<?php
require_once __DIR__ . '/Database.php';

class ImagenModel {

    public static function getAll() {
    }
    public static function getByProductoId($idProducto){
        $con= Database::getConnection();
        $sql='SELECT *FROM imagenes WHERE id_producto=:idProducto';
        $stmt= $con ->prepare($sql);
        $dato=['idProducto'=>$idProducto];
        $stmt->execute($dato);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
