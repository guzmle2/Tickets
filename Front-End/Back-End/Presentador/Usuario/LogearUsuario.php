<?php
/**
 * Created by PhpStorm.
 * User: DIAZ
 * Date: 19/05/2015
 * Time: 06:37 PM
 */

require_once '../../Comun/Usuario.php';

$usuario = "usuario";
$admin = "admin";
$tecnico = "tecnico";

$personaje = Usuario::buscarPorCorreo( $_REQUEST['email']);
if($personaje){
    if($personaje->getClave() == $_REQUEST['password'] )
    {
        if($personaje->getTipo() == $usuario){
            header("location:../../../vistas_usuario/usuario_menuPrincipal.php");
        }elseif($personaje->getTipo() == $admin){
            header("location:../../../vistas_admin/admin_menuPrincipal.php");
        }elseif($personaje->getTipo() == $tecnico){
            header("location:../../../vistas_tecnico/tecnico_menuPrincipal.php");
        }else{
            header("location:../../../index.php?errorusuario=si");
        }
    }else{
        header("location:../../../index.php?errorusuario=si");
    }
}else{
    header("location:../../../UsuarioAgregar.php?email=".$_REQUEST['email']);
}