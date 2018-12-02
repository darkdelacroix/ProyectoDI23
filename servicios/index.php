<?php
/**
 * Created by PhpStorm.
 * User: AlbaLuis
 * Date: 06/11/2018
 * Time: 18:48
 */
//require_once ('../inc/auth.inc.php');
require_once ('../clases/User.php');
require_once ('../clases/Vehiculo.php');
try {
    $vehiculoLista=Vehiculo::mostrarVehiculos();
    if (isset($vehiculoLista)) {
        $json['msg'] = 'Servicio todos los vehiculos';
        $json['succes'] = true;
        $json['data'] = $vehiculoLista;
    } else {
        $json['msg'] = 'No encontrado';
        $json['succes'] = false;
    }
} catch (PDOException $e) {
    $json['msg'] = 'Ha ocurrido un error.' . $e->getMessage();//el valor de mensaje de error del objeto $e no seria necesario para el usuario
    $json['succes'] = false;
}
echo json_encode($json);

