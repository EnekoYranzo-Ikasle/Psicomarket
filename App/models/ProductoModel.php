<?php

require_once __DIR__ . '/Database.php';

class ProductoModel
{


    public static function getAll()
    {
    }
    public static function getByComercioId($idComercio)
    {
        $db = Database::getConnection();

        $stmt = $db->prepare("SELECT
            p.*,
            c.nombre AS Categoria,
            GROUP_CONCAT(i.Ruta_imagen_producto SEPARATOR ',') AS rutas_imagenes
        FROM productos p
        LEFT JOIN categorias c
            ON c.id = p.id_categoria
        LEFT JOIN imagenes i
            ON i.id_producto = p.id
        WHERE p.id_comercio = :id_comercio
        GROUP BY p.id, c.nombre");

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
        return $productos;
    }

    public static function verificarProductoFavorito($idProducto, $idUsuario)
    {
        $datos = ['id_producto' => $idProducto, 'id_usuario' => $idUsuario];
        $db = Database::getConnection();

        $stmt = $db->prepare("Select id From favoritos Where id_producto=:id_producto AND id_usuario=:id_usuario");

        $stmt->execute($datos);
        $favorito = $stmt->fetch(PDO::FETCH_ASSOC);

        return $favorito;
    }

    public static function añadirFavorito($idProducto, $idUsuario)
    {
        $datos = ['id_producto' => $idProducto, 'id_usuario' => $idUsuario];
        $db = Database::getConnection();

        $stmt = $db->prepare("INSERT INTO favoritos (id_producto,id_usuario)  VALUES (:id_producto, :id_usuario)");
        $stmt->execute($datos);

        return $stmt->rowCount() > 0;
    }
    public static function eliminarFavorito($idProducto, $idUsuario)
    {
        $datos = ['id_producto' => $idProducto, 'id_usuario' => $idUsuario];

        $db = Database::getConnection();

        $stmt = $db->prepare("DELETE FROM favoritos WHERE id_producto = :id_producto AND id_usuario = :id_usuario");
        $stmt->execute($datos);


        return $stmt->rowCount() > 0;
    }



    public static function getById($id)
    {
        $db = Database::getConnection();

        $stmt = $db->prepare("SELECT
            p.*,
            c.nombre AS Categoria,
            GROUP_CONCAT(i.Ruta_imagen_producto SEPARATOR ',') AS rutas_imagenes
        FROM productos p
        LEFT JOIN categorias c
            ON c.id = p.id_categoria
        LEFT JOIN imagenes i
            ON i.id_producto = p.id
        WHERE p.id = :id_producto
        GROUP BY p.id, c.nombre");

        $stmt->execute(['id_producto' => $id]);
       return $stmt->fetch(PDO::FETCH_ASSOC);

        
    }

    public static function create($datos)
    {
    }

    public static function deleteById($id)
    {
    }

    public static function deleteAll()
    {
    }
}
