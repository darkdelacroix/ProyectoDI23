<?php
/**
 * Created by PhpStorm.
 * User: AlbaLuis
 * Date: 26/11/2018
 * Time: 19:44
 */
$matricula = isset($_POST['matricula'])?$_POST['matricula']:null ;
$marca= isset($_POST['marca'])?$_POST['marca']:null ;
$anno= isset($_POST['anno'])?$_POST['anno']:null ;
$modelo= isset($_POST['modelo'])?$_POST['modelo']:null ;

try {
    $vehiculo=new Vehiculo();
    Vehiculo::crearVehiculo($vehiculo);
    if (isset($vehiculo)) {
        $json['msg'] = 'Servicio editar vehiculos';
        $json['succes'] = true;
        $json['data'] = $vehiculo;
    } else {
        $json['msg'] = 'No se ha podido insertar el  vehiculo';
        $json['succes'] = false;
    }
} catch (PDOException $e) {
    $json['msg'] = 'Ha ocurrido un error.' . $e->getMessage();//el valor de mensaje de error del objeto $e no seria necesario para el usuario
    $json['succes'] = false;
}

echo json_encode($json);