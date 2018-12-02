<?php
require_once('../clases/User.php');
// Parámetros de entrada
$email = isset($_POST["email"]) ? $_POST["email"] : null;
$password = isset($_POST["password"]) ? $_POST["password"] : null;
//inicializando el array que se convertira en el json, si quiero devolver mas
//parametros del json como por ejemplo el  email que se ha introducido creo un clave mas en el array
//y le doy el valor del email
$json = array(
    "succes" => false,
    "msg" => "",
    "authkey" => ""
);
try {
    $user = User::checkLogin($email, $password);//devuelve un objeto de clase User y podemos acceder a sus metodos
    if (isset($user)) {
        $json['msg'] = 'Bienvenido';
        $json['succes'] = true;
        $json['authkey'] = $user->getToken();
    } else {
        $json['msg'] = 'No encontrado';
        $json['succes'] = false;
    }
} catch (PDOException $e) {
    $json['msg'] = 'Ha ocurrido un error.' . $e->getMessage();//el valor de mensaje de error del objeto $e no seria necesario para el usuario
    $json['succes'] = false;
}
echo json_encode($json);

