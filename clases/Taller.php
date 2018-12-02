<?php

/**
 * Created by PhpStorm.
 * User: AlbaLuis
 * Date: 17/11/2018
 * Time: 19:18
 * nombre char(30) PK
 * direccion varchar(100)
 * telefono char(9)
 * latitud float
 * longitud float
 * img varchar(100)
 */
class Taller
{
    private $nombre;
    private $direccion;
    private $telefono;
    private $latitud;
    private $longitu;
    private $img;

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * @return mixed
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * @param mixed $latitud
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;
    }

    /**
     * @return mixed
     */
    public function getLongitu()
    {
        return $this->longitu;
    }

    /**
     * @param mixed $longitu
     */
    public function setLongitu($longitu)
    {
        $this->longitu = $longitu;
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



}