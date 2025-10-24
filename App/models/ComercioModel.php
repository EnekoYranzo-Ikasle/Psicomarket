<?php
require_once __DIR__ . '/Database.php';

class ComercioModel
{


    public static function getAll($busqueda = null, $valoracion = null, $cantidadProductos = null, $categorias = null)
    {
        $con = Database::getConnection();

        $sql = "SELECT c.*, COUNT(p.id) AS total_productos, AVG(v.estrellas) AS promedio_valoracion
            FROM comercios c
            LEFT JOIN productos p ON p.id_comercio = c.id
            LEFT JOIN valoraciones v ON v.id_comercio = c.id
            WHERE 1=1";

        $params = [];

        if ($busqueda) {
            $sql .= " AND c.Nombre_comercio LIKE ? ";
            $params[] = "%$busqueda%";
        }

        if (!empty($categorias)) {
            $placeholders = implode(',', array_fill(0, count($categorias), '?'));
            $sql .= " AND p.id_categoria IN ($placeholders)";
            $params = array_merge($params, $categorias);
        }

        $sql .= " GROUP BY c.id";

        if ($valoracion === "mayorMenor") {
            $sql .= " ORDER BY promedio_valoracion DESC";
        } elseif ($valoracion === "menorMayor") {
            $sql .= " ORDER BY promedio_valoracion ASC";
        } elseif ($cantidadProductos === "mayorMenor") {
            $sql .= " ORDER BY total_productos DESC";
        } elseif ($cantidadProductos === "menorMayor") {
            $sql .= " ORDER BY total_productos ASC";
        }
        $stmt = $con->prepare($sql);
        $stmt->execute($params);;
        $comercios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $comercios;
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
        $dato = ['id' => $id];
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
        $sql = "SELECT id, Nombre_comercio, Latitud, Longitud FROM comercios";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $comerciosCoords = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $comerciosCoords;
    }
    public static function getCoordsMiComercio($idUsuario)
    {
        $con = Database::getConnection();
        $sql = "SELECT id, Nombre_comercio, Latitud, Longitud FROM comercios Where id_usuario =:idUsuario";
        $stmt = $con->prepare($sql);
        $stmt->execute(['idUsuario' => $idUsuario]);
        $comerciosCoords = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $comerciosCoords;
    }

    public static function eliminarAnuncio($idAnuncio, $idComerciante)
    {
        $datos = ['idAnuncio' => $idAnuncio, 'idComerciante' => $idComerciante];
        $db = Database::getConnection();
        $stmt = $db->prepare("DELETE FROM comercios WHERE id=:idAnuncio AND id_usuario=:idComerciante");
        $stmt->execute($datos);
        return $stmt->rowCount() > 0;
    }

    public static function editarAnuncio($anuncioId, $nombre, $descripcion)
    {
        $datos = [
            'idAnuncio' => $anuncioId,
            'nombre' => $nombre,
            'descripcion' => $descripcion
        ];
        $db = Database::getConnection();
        $stmt = $db->prepare("UPDATE comercios SET Nombre_comercio = :nombre, Descripcion = :descripcion WHERE id = :idAnuncio");
        $stmt->execute($datos);
        return $stmt->rowCount() > 0;
    }
}
