<?php
class Db{
    static function getConnection()
    {
        $conexion = new PDO('mysql:host=localhost;dbname=test', 'root', '');
        return $conexion;
    }
}
// cierra la clase DB