<?php
/**
 * Created by PhpStorm.
 * User: DIAZ
 * Date: 15/05/2015
 * Time: 10:44 PM
 */
  require_once '../../Comun/Usuario.php';
    $usuario = new Usuario(
        $_POST['nombre'],
        $_POST['apellido'],
        $_POST['cedula'],
        $_POST['celular'],
        $_POST['extension'],
        $_POST['gerencia'],
        $_POST['clave'],
        'usuario',
        $_POST['correo'], null);
    $usuario->guardar();
    echo $usuario->getNombre() . ' se ha guardado correctamente con el id: ' . $usuario->getId();
