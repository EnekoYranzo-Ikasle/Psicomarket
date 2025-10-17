<?php

use function PHPSTORM_META\sql_injection_subst;

require_once __DIR__ . '/Database.php';

class ProductoModel {
   

    public static function getAll() {
        
    }
    public static function getByComercioId($idComercio){
        $con=Database::getConnection();
        $sql= "SELECT * FROM productos WHERE id_comercio=:id_comercio";
        $stmt = $con->prepare($sql);
        $dato =['id_comercio' => $idComercio];
        $stmt-> execute($dato);
        $productosDelComercio= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $productosDelComercio;
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
