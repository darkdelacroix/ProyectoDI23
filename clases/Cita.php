<?php

/**
 * Created by PhpStorm.
 * User: AlbaLuis
 * Date: 17/11/2018
 * Time: 19:18
 *
 * cColumns:
 * fecha date PK
 * hora time
 * km int(11)
 * id_vehiculo char(7) PK
 * id_taller char(30)
 */
class Cita
{
    private $fecha;
    private $hora;
    private $km;
    private $id_vehiculo;
    private $id_taller;

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * @param mixed $hora
     */
    public function setHora($hora)
    {
        $this->hora = $hora;
    }

    /**
     * @return mixed
     */
    public function getKm()
    {
        return $this->km;
    }

    /**
     * @param mixed $km
     */
    public function setKm($km)
    {
        $this->km = $km;
    }

    /**
     * @return mixed
     */
    public function getIdVehiculo()
    {
        return $this->id_vehiculo;
    }

    /**
     * @param mixed $id_vehiculo
     */
    public function setIdVehiculo($id_vehiculo)
    {
        $this->id_vehiculo = $id_vehiculo;
    }

    /**
     * @return mixed
     */
    public function getIdTaller()
    {
        return $this->id_taller;
    }

    /**
     * @param mixed $id_taller
     */
    public function setIdTaller($id_taller)
    {
        $this->id_taller = $id_taller;
    }





}