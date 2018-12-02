<?php
/**
 * Created by PhpStorm.
 * User: Luis
 * Date: 30/11/2018
 * Time: 22:15
 */
require_once ('../clases/Vehiculo.php');
$pagina = (isset($_POST['pagina'])? $_POST['pagina'] : 1);
$num_registros = (isset($_POST['num_registros'])? $_POST['num_registros'] : 10);
$primero = (isset($_POST['primero'])? true : false);
$ultimo = (isset($_POST['ultimo'])? true : false);
$siguiente = (isset($_POST['siguiente'])? true : false);
$anterior = (isset($_POST['anterior'])? true : false);
$mostrar = (isset($_POST['mostrar'])? true : false);
$matricula = isset($_POST['matricula'])?$_POST['matricula']:null ;
$marca= isset($_POST['marca'])?$_POST['marca']:null ;
$anno= isset($_POST['anno'])?$_POST['anno']:null ;
$modelo= isset($_POST['modelo'])?$_POST['modelo']:null ;
$id_cliente= isset($_POST['id_cliente'])?$_POST['id_cliente']:null ;
$id_vehiculo_tipo= isset($_POST['id_vehiculo_tipo'])?$_POST['id_vehiculo_tipo']:null ;
$json = array(
    //aqui se parametriza el json
//    "matricula"=>$matricula,
//    "marca"=>$marca,
//    "modelo"=>$modelo,
        "pagina"=>$pagina,
    "mostrarIN"=>$mostrar,

    "num_registrosIN"=>$num_registros,

    "primeroIN"=>$primero,

    "ultimoIN"=>$ultimo,

    "siguienteIN"=>$siguiente,

"num_paginas"=>""
);

$arrVehiculos=array(

);
try {
$sql = "select count(*) from vehiculo where true"; // se le añade el true para que siempre lleve where y poder añadri filtros de forma cómoda
$sql_filters = ""; // Se crea la sql de filtros para reutilizarla
$filters = array();
if (!empty($matricula)){
    $sql_filters .= " and matricula like :matricula";
    $filters[":matricula"] = "%".$matricula."%";
}
if (!empty($marca)) {
    $sql_filters .= " and marca like :marca";
    $filters[":marca"] = "%".$marca."%";
}
if (!empty($anno)) {
    $sql_filters .= " and anno like :anno";
    $filters[":anno"] = "%".$anno."%";
}

    if (!empty($modelo)) {
        $sql_filters .= " and modelo like :modelo";
        $filters[":modelo"] = "%".$modelo."%";
    }

    if (!empty($id_cliente)) {
        $sql_filters .= " and id_cliente like :id_cliente";
        $filters[":id_cliente"] = "%".$id_cliente."%";
    }
    if (!empty($id_vehiculo_tipo)) {
        $sql_filters .= " and id_vehiculo_tipo like :id_vehiculo_tipo";
        $filters[":id_vehiculo_tipo"] = "%".$id_vehiculo_tipo."%";
    }

$sql .= $sql_filters;
  $total_registros=  Vehiculo::contador($sql,$filters);
//$stmt = $con->prepare($sql);
//$stmt->execute($filters);
//$result = $stmt->fetch();
//$total_registros = $result[0];
// Cálculo de Acciones
    //ME DA ERROR EN EL CEIL Y NO SALE PONE 10 DONDE DEBERIA PONER $paginas
$paginas = ceil($total_registros["count(*)"]/$num_registros);
$json["num_paginas"]=$paginas;
if ($primero) $pagina = 1;
if ($ultimo) $pagina = $total_registros["count(*)"];
if ($siguiente && $pagina<$total_registros["count(*)"]) $pagina++;
if ($anterior && $pagina>1) $pagina--;
if ($mostrar) $pagina = 1;
// OBTENCIÓN ALUMNOS
$sql = 'SELECT * FROM vehiculo where true'; // se le añade el true para que siempre lleve where y poder añadri filtros de forma cómoda
$sql .= $sql_filters;
if ($num_registros != "todos")
    $sql .= " limit ".($num_registros*($pagina-1)) .",". $num_registros;
//echo $sql;exit();
//$stmt = $con->prepare($sql);
//$stmt->execute($filters);
    $arrVehiculos=Vehiculo::paginador($sql,$filters);
// Devuelve un array multidimensional con todos los datos de la query

    $json['msg'] = 'Servicio todos los vehiculos';
    $json['succes'] = true;
    $json['data'] = $arrVehiculos;
    $json['num_registros']=$num_registros;
} catch (PDOException $e) {
    $json['msg'] = 'Ha ocurrido un error.' . $e->getMessage();//el valor de mensaje de error del objeto $e no seria necesario para el usuario
    $json['succes'] = false;
}

echo json_encode($json);