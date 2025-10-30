<?php
require_once __DIR__ . '/Database.php';

class ValoracionModel
{

    public static function getAll() {}
    
    public static function getValoracionMedia($idComercio)
    {
        $con = Database::getConnection();
        $sql = "SELECT IFNULL(AVG(estrellas), 0) AS media
                FROM valoraciones
                WHERE id_comercio = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$idComercio]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado ? round($resultado['media'], 1) : 0;
    }

    public static function getById($id) {}

    public static function create($estrellas, $idUsuario, $idComercio)
    {
            $con = Database::getConnection();
            $sql = 'INSERT INTO valoraciones (estrellas, id_usuario, id_comercio)
                    VALUES (:estrellas, :idUsuario, :idComercio)';
            $stmt = $con->prepare($sql);
            $datos = [
                'estrellas' => $estrellas,
                'idUsuario' => $idUsuario,
                'idComercio' => $idComercio
            ];
            $stmt->execute($datos);
            
            
            
       
        }
    

    public static function yaValorado($idUsuario, $idComercio)
    {
        $con = Database::getConnection();
        $stmt = $con->prepare("SELECT COUNT(*) FROM valoraciones WHERE id_usuario = :idUsuario AND id_comercio = :idComercio");
        $stmt->execute([':idUsuario' => $idUsuario, ':idComercio' => $idComercio]);
        return $stmt->fetchColumn() > 0;
    }

    public static function deleteById($id) {}

    public static function deleteAll() {}
}