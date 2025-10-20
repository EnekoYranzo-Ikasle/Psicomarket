<?php

require_once __DIR__ . '/Database.php';

class ProductoModel
{


    public static function getAll() {}
    public static function getByComercioId($idComercio)
    {
        $db = Database::getConnection();

        $stmt = $db->prepare(
        "SELECT
            p.*,
            c.nombre AS Categoria,
            GROUP_CONCAT(i.Ruta_imagen_producto SEPARATOR ',') AS rutas_imagenes
        FROM productos p
        LEFT JOIN categorias c
            ON c.id = p.id_categoria
        LEFT JOIN imagenes i
            ON i.id_producto = p.id
        WHERE p.id_comercio = :id_comercio
        GROUP BY p.id, c.nombre
    "
    );

        $stmt->execute(['id_comercio' => $idComercio]);
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($productos as &$producto) {
            if (!empty($producto['rutas_imagenes'])) {
                $producto['rutas_imagenes'] = array_map(
                    fn($ruta) => ['ruta' => $ruta],
                    explode(',', $producto['rutas_imagenes'])
                );
            } else {
                $producto['rutas_imagenes'] = [];
            }
        }
        error_log("Productos: " . var_export($productos,true), 3, __DIR__ . '/debug.log');
        return $productos;
    }


    public static function getById($id) {}

    public static function create($datos) {}

    public static function deleteById($id) {}

    public static function deleteAll() {}
}
