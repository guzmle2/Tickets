<?php
/**
 * Created by PhpStorm.
 * User: DIAZ
 * Date: 18/05/2015
 * Time: 10:51 PM
 */

require_once '../../Comun/Tickets.php';
require_once '../../Comun/Usuario.php';
session_start();
$str = $_SESSION['id_usuario'];

$tickets = new Tickets(
    $_POST['prioridad'],
    $_POST['SO'],
    $_POST['asunto'],
    $_POST['detalle'],
    'NUEVO',
    '0',
    '0',
    $str,
    null);
$tickets->guardar();
if($tickets->getId() == 0){
    header("location:../../../vistas_usuario/usuario_menuPrincipal.php?TicketGenerado=no");
}else{
    header("location:../../../vistas_usuario/usuario_menuPrincipal.php?TicketGenerado=si");
}
