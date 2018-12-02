<?php

/**
 * Created by PhpStorm.
 * User: AlbaLuis
 * Date: 17/11/2018
 * Time: 19:19
 * id char(15) PK
descripcion varchar(100)
 */
class VehiculoTipo
{
    private $id;
    private $descripcion;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }





}