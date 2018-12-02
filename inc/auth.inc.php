<?php
require_once ('../clases/User.php');

// Parámetros de entrada
$authkey = isset($_POST['authkey'])?$_POST['authkey']:null ;
// JSON
$json_error = json_encode(array(
    "succes"=>false,
    "msg"=>"No tienes permisos para acceder a esta sección.",
    "authkey"=>""
));
$logued = User::checkAuthkey($authkey);
// Si no está definido el auth_key retorna JSON de error
if ( !$logued ) {
    echo $json_error;
    // Finaliza para que no ejecute el código del archivo que lo incluya
    exit();
}
//
