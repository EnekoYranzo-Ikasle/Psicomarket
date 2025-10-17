<?php
require_once __DIR__ . '/Database.php';

class FavoritoModel
{

    public static function getAll($idUsuario)
    {
        $datos = ['idUsuario' => $idUsuario];
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT
                p.*,
                GROUP_CONCAT(i.Ruta_imagen_producto SEPARATOR ',') AS rutas_imagenes
                FROM productos p
                JOIN favoritos f
                    ON f.id_producto = p.id
                LEFT JOIN imagenes i
                    ON i.id_producto = p.id
                WHERE f.id_usuario = :idUsuario
                GROUP BY p.id;
            ");
        $stmt->execute($datos);
        $favoritos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($favoritos as &$producto) {
            if (!empty($producto['rutas_imagenes'])) {
                $rutas = explode(',', $producto['rutas_imagenes']);
                $producto['rutas_imagenes'] = array_map(function ($ruta) {
                    return ['ruta' => $ruta];
                }, $rutas);
            } else {
                $producto['rutas_imagenes'] = [];
            }
        }

        return $favoritos;
    }

    public static function getById($id) {}

    public static function create($datos) {}

    public static function deleteById($id) {}

    public static function deleteAll() {}
}
