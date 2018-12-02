<?php
require_once('ConexionSingleton.php');

/**
 * Created by PhpStorm.
 * User: AlbaLuis
 * Date: 19/10/2018
 * Time: 15:41
 *
 */
class User
{
   private $usuario;
   private $clave;
   private $fecha_inicio;
    private $fecha_fin;
    private $img;
    private $token;

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }


    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * @param mixed $clave
     */
    public function setClave($clave)
    {
        $this->clave = $clave;
    }

    /**
     * @return mixed
     */
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    /**
     * @param mixed $fecha_inicio
     */
    public function setFechaInicio($fecha_inicio)
    {
        $this->fecha_inicio = $fecha_inicio;
    }

    /**
     * @return mixed
     */
    public function getFechaFin()
    {
        return $this->fecha_fin;
    }

    /**
     * @param mixed $fecha_fin
     */
    public function setFechaFin($fecha_fin)
    {
        $this->fecha_fin = $fecha_fin;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param mixed $img
     */
    public function setImg($img)
    {
        $this->img = $img;
    }

    function User (){
    }

    public function checkAuthkey($token){
        try{
            $db=ConexionSingleton::conectar();
            $select=$db->prepare('SELECT * FROM usuario WHERE token=:token and fecha_fin>now()');
            $select->bindValue('token',$token);
            $select->execute();
            if ( $select->rowCount()>0){
                return true;
            }else{
                return false;
            }
        }catch (PDOException $e){
            throw new PDOException($e->getMessage());
        }
    }
    public function borrarUsuario($id){

    }
    public function mostrarUsuarios(){

    }

//    public function modificarUsuario( $usuario){
//        try{
//            $db=ConexionSingleton::conectar();
//            $select=$db->prepare('UPDATE user SET   WHERE usuario=:usuario');
//            $select->bindValue('usuario',$usuario->getUsuario());
//            $select->bindValue('clave',$claveHash);
//            $select->setFetchMode(PDO::FETCH_CLASS, 'User');
//            $select->execute();
//            $userLog=$select->fetch();
//            if ($select->rowCount()>0){
//                // generar el auth key
//                $cadena=  $userLog->getUsuario()."".rand(1,100);
//                $token = hash('sha256', $cadena);
//                $select= $db->prepare('UPDATE usuario SET token=:token, fecha_inicio=NOW(), fecha_fin=date_add(now(),interval '.TIEMPOTOKEN.' MINUTE ) WHERE usuario= :usuario');
//                $select->bindValue('token',$token);
//                $select->bindValue('usuario',$usuario);
//                $select->execute();
//                $userLog->setToken($token);
//                return $userLog;
//            }else{
//                return null;
//            }
//        }catch (PDOException $e){
//            throw new PDOException($e->getMessage());
//        }
//
//    }

    public  function checkLogin($usuario, $clave){
        try{
            $claveHash=hash('sha256',$clave);
            $db=ConexionSingleton::conectar();
            $select=$db->prepare('SELECT * FROM usuario WHERE usuario=:usuario and clave=:clave');
            $select->bindValue('usuario',$usuario);
            $select->bindValue('clave',$claveHash);
            $select->setFetchMode(PDO::FETCH_CLASS, 'User');
            $select->execute();
            $userLog=$select->fetch();
            if ($select->rowCount()>0){
                // generar el auth key
              $cadena=  $userLog->getUsuario()."".rand(1,100);
                $token = hash('sha256', $cadena);
                $select= $db->prepare('UPDATE usuario SET token=:token, fecha_inicio=NOW(), fecha_fin=date_add(now(),interval '.TIEMPOTOKEN.' MINUTE ) WHERE usuario= :usuario');
                $select->bindValue('token',$token);
                $select->bindValue('usuario',$usuario);
                $select->execute();
                $userLog->setToken($token);
                return $userLog;
            }else{
                return null;
            }
        }catch (PDOException $e){
            throw new PDOException($e->getMessage());
        }
    }
}