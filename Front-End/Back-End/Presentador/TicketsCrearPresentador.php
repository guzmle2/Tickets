<?php
/**
 * Created by PhpStorm.
 * User: DIAZ
 * Date: 18/05/2015
 * Time: 10:51 PM
 */

require_once 'EntidadTickets.php';
require_once 'EntidadUsuario.php';
session_start();
$str = $_SESSION['id_usuario'];

$tickets = new Tickets(
    $_POST['prioridad'],
    $_POST['SO'],
    $_POST['asunto'],
    $_POST['detalle'],
    'NUEVO',
    '0',
    '',
    $str,
    null);
$tickets->guardar();
if($tickets->getId() == 0){
    header("location:../../vistas_usuario/index.php?TicketGenerado=no");
}else{
    header("location:../../vistas_usuario/index.php?TicketGenerado=si");
}


