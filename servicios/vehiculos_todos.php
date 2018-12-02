<?php
/**
 * Created by PhpStorm.
 * User: AlbaLuis
 * Date: 26/11/2018
 * Time: 19:44
 */
require_once ('../clases/Vehiculo.php');
try {
    $vehiculoLista=Vehiculo::mostrarVehiculos();
    if (isset($vehiculoLista)) {
        $json['msg'] = 'Servicio todos los vehiculos';
        $json['succes'] = true;
        $json['data'] = $vehiculoLista;
    } else {
        $json['msg'] = 'No se han encontrado vehiculos';
        $json['succes'] = false;
    }
} catch (PDOException $e) {
    $json['msg'] = 'Ha ocurrido un error.' . $e->getMessage();//el valor de mensaje de error del objeto $e no seria necesario para el usuario
    $json['succes'] = false;
}

echo json_encode($json);