<?php
/**
 * Created by PhpStorm.
 * User: DIAZ
 * Date: 14/05/2015
 * Time: 09:09 PM
 */
require_once 'Conexion.php';
class Tickets{

    public $id;
    public $prioridad;
    public $SO;
    public $asunto;
    public $detalle;
    public $estado;
    public $id_encargado;
    public $id_creador;
    public $estadoDetalle;
    const TABLA = 'tickets';



    public function __construct($p, $os, $a, $d,$e,$enc,$ed,$usrCr, $i ){
        $this -> setId($i);
        $this -> setPrioridad($p);
        $this -> setSO($os);
        $this -> setAsunto($a);
        $this -> setDetalle($d);
        $this -> setEstado($e);
        $this -> setIdEncargado($enc);
        $this -> setEstadoDetalle($ed);
        $this -> setIdCreador($usrCr);
    }


    public function guardar(){
        $conexion = new Conexion();
        if($this->id) /*Modifica*/ {
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET
            SO = :SO,
            asunto = :asunto,
            detalle = :detalle,
            estado = :estado,
            id_usrEncargado = :id_usrEncargado,
            estadoDetalle = :estadoDetalle,
            prioridad = :prioridad,
            id_usrCreador = :id_creador,
             WHERE id = :id');
            $consulta->bindParam(':SO', $this->getSO());
            $consulta->bindParam(':asunto', $this->getAsunto());
            $consulta->bindParam(':detalle', $this->getDetalle());
            $consulta->bindParam(':estado', $this->getEstado());
            $consulta->bindParam(':id_usrEncargado', $this->getIdEncargado());
            $consulta->bindParam(':estadoDetalle', $this->getEstadoDetalle());
            $consulta->bindParam(':prioridad', $this->getPrioridad());
            $consulta->bindParam(':id_creador', $this->getIdCreador());
            $consulta->execute();
        }else /*Inserta*/ {
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .'
             (SO,
            asunto,
            detalle,
            estado,
            id_usrEncargado,
            estadoDetalle,
            prioridad,
            id_usrCreador)
             VALUES
             (:SO,
            :asunto,
            :detalle,
            :estado,
            :id_usrEncargado,
            :estadoDetalle,
            :prioridad,
            :id_usrCreador)');
            $consulta->bindParam(':SO', $this->getSO());
            $consulta->bindParam(':asunto', $this->getAsunto());
            $consulta->bindParam(':detalle', $this->getDetalle());
            $consulta->bindParam(':estado', $this->getEstado());
            $consulta->bindParam(':id_usrEncargado', $this->getIdEncargado());
            $consulta->bindParam(':estadoDetalle', $this->getEstadoDetalle());
            $consulta->bindParam(':prioridad', $this->getPrioridad());
            $consulta->bindParam(':id_usrCreador', $this->getIdCreador());
            $consulta->execute();
            $this->id = $conexion->lastInsertId();
        }
        $conexion = null;
    }

    /**
     * metodo para ubicar por id
     * @param $id parametro de busqueda
     * @return bool|Usuario si agrego
     */
    public static function buscarPorId($id){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT SO,
                                                asunto,
                                                detalle,
                                                estado,
                                                id_usrEncargado,
                                                estadoDetalle,
                                                prioridad,
                                                id_usrCreador
                                                FROM ' . self::TABLA . ' WHERE id = :id');
        $consulta->bindParam(':id', $id);
        $consulta->execute();
        $registro = $consulta->fetch();
        if($registro){
            return new self($registro['SO'],
                $registro['asunto'],
                $registro['detalle'],
                $registro['estado'],
                $registro['id_usrEncargado'],
                $registro['estadoDetalle'],
                $registro['prioridad'],
                $registro['id_usrCreador'],
                $id);
        }else{
            return false;
        }
    }

    /**
     * metodo para ubicar por id
     * @param $id parametro de busqueda
     * @return bool|Usuario si agrego
     */
    public static function buscarPorEstado($co){
        $conexion = new Conexion();

        $consulta = $conexion->prepare('SELECT SO,
                                                asunto,
                                                detalle,
                                                estado,
                                                id_usrEncargado,
                                                estadoDetalle,
                                                prioridad,
                                                id_usrCreador
                                                FROM ' . self::TABLA . ' WHERE estado = :status ORDER BY 1 ASC ');
        $consulta->bindParam(':status', $co);
        $consulta->execute();
        $registro = $consulta->fetch();
        if($registro){
            return new self(
                $registro['SO'],
                $registro['asunto'],
                $registro['detalle'],
                $registro['estado'],
                $registro['id_usrEncargado'],
                $registro['estadoDetalle'],
                $registro['prioridad'],
                $registro['id_usrCreador'],
                $registro['id']);
        }else{
            return false;
        }
    }

    public static function buscarPorIdCreador($idn){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE id_usrCreador = :id_usrCreador ORDER BY 1 ASC ');
        $consulta->bindParam(':id_usrCreador', $idn);
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;
    }


    /**
     * @return mixed
     */
    public function getPrioridad()
    {
        return $this->prioridad;
    }

    /**
     * @param mixed $prioridad
     */
    public function setPrioridad($prioridad)
    {
        $this->prioridad = $prioridad;
    }

    /**
     * @return mixed
     */
    public function getAsunto()
    {
        return $this->asunto;
    }

    /**
     * @param mixed $asunto
     */
    public function setAsunto($asunto)
    {
        $this->asunto = $asunto;
    }

    /**
     * @return mixed
     */
    public function getDetalle()
    {
        return $this->detalle;
    }

    /**
     * @param mixed $detalle
     */
    public function setDetalle($detalle)
    {
        $this->detalle = $detalle;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getEstadoDetalle()
    {
        return $this->estadoDetalle;
    }

    /**
     * @param mixed $estadoDetalle
     */
    public function setEstadoDetalle($estadoDetalle)
    {
        $this->estadoDetalle = $estadoDetalle;
    }

    /**
     * @return mixed
     */
    public function getSO()
    {
        return $this->SO;
    }

    /**
     * @param mixed $SO
     */
    public function setSO($SO)
    {
        $this->SO = $SO;
    }

    /**
     * @return mixed
     */
    public function getIdCreador()
    {
        return $this->id_creador;
    }

    /**
     * @param mixed $id_creador
     */
    public function setIdCreador($id_creador)
    {
        $this->id_creador = $id_creador;
    }

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
    public function getIdEncargado()
    {
        return $this->id_encargado;
    }

    /**
     * @param mixed $id_encargado
     */
    public function setIdEncargado($id_encargado)
    {
        $this->id_encargado = $id_encargado;
    }

}