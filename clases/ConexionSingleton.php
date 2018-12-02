<?php
include_once ("../configuracion/conf.inc.php");

/**
 * Created by PhpStorm.
 * User: AlbaLuis
 * Date: 06/11/2018
 * Time: 18:42
 */
class ConexionSingleton
{
    private static $conexion=NULL;
    private function __construct (){}

    public static function conectar(){

        try {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$conexion = new PDO(DBNAME, USERNAME, PASSWORD, $pdo_options);
            return self::$conexion;
        }catch(PDOException $e) {
//                echo 'Error: ' . $e->getMessage();
            throw new PDOException($e->getMessage());
        }
    }
}
