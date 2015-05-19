<?php
/**
 * Created by PhpStorm.
 * User: DIAZ
 * Date: 14/05/2015
 * Time: 09:09 PM
 */

class Tickets extends EntidadBase{

    public $prioridad;
    public $SO;
    public $asunto;
    public $detalle;
    public $estado;
    public $id_encargado;
    public $id_creador;
    public $estadoDetalle;
    const TABLA = 'tickets';



    public function __construct($p, $so, $a, $d,$e,$enc,$ed,$usrCr ){
        $this -> setPrioridad($p);
        $this -> setSO($so);
        $this -> setAsunto($a);
        $this -> setDetalle($d);
        $this -> setEstado($e);
        $this -> setEncargado($enc);
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
            id_usrEncargado = :id_usr,
            estadoDetalle = :estadoDetalle,
            prioridad = :prioridad,
            id_usrCreador = :id_creador,
             WHERE id = :id');
            $consulta->bindParam(':SO', $this->getSistemaOperativo());
            $consulta->bindParam(':asunto', $this->getAsunto());
            $consulta->bindParam(':detalle', $this->getDetalle());
            $consulta->bindParam(':estado', $this->getEstado());
            $consulta->bindParam(':id_usrEncargado', $this->getEncargado());
            $consulta->bindParam(':estadoDetalle', $this->getEstadoDetalle());
            $consulta->bindParam(':prioridad', $this->getPrioridad());
            $consulta->bindParam(':id_creador', $this->getIdCreador());
            $consulta->execute();
        }else /*Inserta*/ {
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .'
             ( SO,
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
              :id_usrEncargado,
              :estadoDetalle,
              :prioridad,
              :id_usrCreador');
            $consulta->bindParam(':SO', $this->getSistemaOperativo());
            $consulta->bindParam(':asunto', $this->getAsunto());
            $consulta->bindParam(':detalle', $this->getDetalle());
            $consulta->bindParam(':estado', $this->getEstado());
            $consulta->bindParam(':id_usrEncargado', $this->getEncargado());
            $consulta->bindParam(':estadoDetalle', $this->getEstadoDetalle());
            $consulta->bindParam(':prioridad', $this->getPrioridad());
            $consulta->bindParam(':id_creador', $this->getIdCreador());
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
        $consulta = $conexion->prepare('SELECT nombre,
                                                apellido,
                                                cedula,
                                                celular,
                                                extension,
                                                gerencia,
                                                clave,
                                                tipo,
                                                correo
                                                FROM ' . self::TABLA . ' WHERE id = :id');
        $consulta->bindParam(':id', $id);
        $consulta->execute();
        $registro = $consulta->fetch();
        if($registro){
            return new self($registro['nombre'],
                $registro['apellido'],
                $registro['cedula'],
                $registro['celular'],
                $registro['extension'],
                $registro['gerencia'],
                $registro['clave'],
                $registro['tipo'],
                $registro['correo'],
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
    public static function buscarPorCorreo($co){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT id,
                                                nombre,
                                                apellido,
                                                cedula,
                                                celular,
                                                extension,
                                                gerencia,
                                                clave,
                                                tipo
                                                FROM ' . self::TABLA . ' WHERE correo = :correo');
        $consulta->bindParam(':correo', $co);
        $consulta->execute();
        $registro = $consulta->fetch();
        if($registro){
            return new self(
                $registro['id'],
                $registro['nombre'],
                $registro['apellido'],
                $registro['cedula'],
                $registro['celular'],
                $registro['extension'],
                $registro['gerencia'],
                $registro['clave'],
                $registro['tipo'],
                $co);
        }else{
            return false;
        }
    }


    public static function BuscarPorTipoUsuario($tip){
        $conexion = new Conexion();
        $consulta = $conexion->prepare(('SELECT *FROM ' . self::TABLA . ' WHERE tipo = :tipo'));
        $consulta->bindParam(':tipo', $tip);
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
    public function getSistemaOperativo()
    {
        return $this->sistemaOperativo;
    }

    /**
     * @param mixed $sistemaOperativo
     */
    public function setSistemaOperativo($sistemaOperativo)
    {
        $this->sistemaOperativo = $sistemaOperativo;
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
    public function getEncargado()
    {
        return $this->encargado;
    }

    /**
     * @param mixed $encargado
     */
    public function setEncargado($encargado)
    {
        $this->encargado = $encargado;
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

}