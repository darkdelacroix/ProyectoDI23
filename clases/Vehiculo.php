<?php
require_once('ConexionSingleton.php');
/**
 * Created by PhpStorm.
 * User: AlbaLuis
 * Date: 17/11/2018
 * Time: 19:19
 * matricula char(7) PK
 * marca varchar(20)
 * modelo varchar(20)
 * anno smallint(4)
 * color varchar(10)
 * img varchar(100)
 * id_cliente char(9)
 * id_vehiculo_tipo char(15)
 */
//public $matricula;
//public $marca;
//public $modelo;
//public $anno;
//public $color;
//public $img;
//public $id_cliente;
//public $id_vehiculo_tipo;
class Vehiculo
{
    public $matricula;
    public $marca;
    public $modelo;
    public $anno;
    public $color;
    public $img;
    public $id_cliente;
    public $id_vehiculo_tipo;
//    private $matricula;
//    private $marca;
//    private $modelo;
//    private $anno;
//    private $color;
//    private $img;
//    private $id_cliente;
//    private $id_vehiculo_tipo;

//    public function __construct()
//    {
//        $this->Vehiculo();
//    }


    function Vehiculo($matricula,$marca,$modelo,$anno){

        $this->matricula = $matricula;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->anno = $anno;
    }
    public function mostrarVehiculos(){
        try{
            $vehiculo=new Vehiculo();
            $db=ConexionSingleton::conectar();
            $select=$db->query('SELECT * FROM vehiculo');

            $select->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Vehiculo');
            $select->execute();
            $vehiculoLista=$select->fetchAll();
            if ($select->rowCount()>0){
                // generar el auth key
               return $vehiculoLista;
            }else{
                return null;
            }
        }catch (PDOException $e){
            throw new PDOException($e->getMessage());
        }
    }
    public function contador($consulta,$filters){
        try{

            $db=ConexionSingleton::conectar();
            $select=$db->prepare($consulta);
            $select->execute($filters);

//            $select->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Vehiculo');
            //hay que poner setFetchMode??

            $contador=$select->fetch();
            if ($select->rowCount()>0){
                // generar el auth key
                return $contador;
            }else{
                return null;
            }
        }catch (PDOException $e){
            throw new PDOException($e->getMessage());
        }
    }
    public function paginador($consulta,$filters){
        try{

            $db=ConexionSingleton::conectar();
            $select=$db->prepare($consulta);
            $select->execute($filters);
            $vehiculoLista=$select->fetchAll();
            if ($select->rowCount()>0){
                // generar el auth key
                return $vehiculoLista;
            }else{
                return null;
            }
        }catch (PDOException $e){
            throw new PDOException($e->getMessage());
        }
    }

    public function borrarVehiculo($matricula){
        try{

            $db=ConexionSingleton::conectar();
            $select=$db->prepare('SELECT * FROM vehiculo WHERE matricula=:matricula');
            $select->bindValue('matricula',$matricula);
            $select->execute();
            if ($select->rowCount()>0){
                $select=$db->prepare('DELETE FROM vehiculo WHERE matricula=:matricula');
                $select->bindValue('matricula',$matricula);
                $select->execute();
                return true;
            }else{
                return false;
            }
        }catch (PDOException $e){
            throw new PDOException($e->getMessage());
        }

    }
    public function editarVehiculo($matricula){
        try{
            $db=ConexionSingleton::conectar();
            $select=$db->prepare('SELECT * FROM vehiculo WHERE matricula=:matricula');
            $select->bindValue('matricula',$matricula);
            $select->execute();
            if ($select->rowCount()>0){
//                $select->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Vehiculo');

                $vehiculo=$select->fetch();
                return $vehiculo;
            }else{
                return null;
            }
        }catch (PDOException $e){
            throw new PDOException($e->getMessage());
        }

}

        public function actualizarVehiculo($vehiculo){
            try {
                $db = ConexionSingleton::conectar();
                $select = $db->prepare('UPDATE vehiculo SET marca=:marca,  modelo=:modelo, anno=:anno, color=:color, id_cliente=id_cliente, id_vehiculo_tipo=:id_vehiculo_tipo    WHERE matricula=:matricula');
                $select->bindValue('matricula', $vehiculo->getMatricula());
                $select->bindValue('marca', $vehiculo->getMarca());
                $select->bindValue('modelo', $vehiculo->getModelo());
                $select->bindValue('anno', $vehiculo->getAnno());
                $select->bindValue('color', $vehiculo->getColor());
                $select->bindValue('id_cliente', $vehiculo->getIdCliente());
                $select->bindValue('id_vehiculo_tipo', $vehiculo->getVehiculoTipo());
                $select->execute();
            }catch (PDOException $e){
                throw new PDOException($e->getMessage());
            }
        }


    /**
     * @return mixed
     */
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * @param mixed $matricula
     */
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;
    }

    /**
     * @return mixed
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * @param mixed $marca
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    /**
     * @return mixed
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * @param mixed $modelo
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    /**
     * @return mixed
     */
    public function getAnno()
    {
        return $this->anno;
    }

    /**
     * @param mixed $anno
     */
    public function setAnno($anno)
    {
        $this->anno = $anno;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color)
    {
        $this->color = $color;
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

    /**
     * @return mixed
     */
    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    /**
     * @param mixed $id_cliente
     */
    public function setIdCliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;
    }

    /**
     * @return mixed
     */
    public function getIdVehiculoTipo()
    {
        return $this->id_vehiculo_tipo;
    }

    /**
     * @param mixed $id_vehiculo_tipo
     */
    public function setIdVehiculoTipo($id_vehiculo_tipo)
    {
        $this->id_vehiculo_tipo = $id_vehiculo_tipo;
    }



}