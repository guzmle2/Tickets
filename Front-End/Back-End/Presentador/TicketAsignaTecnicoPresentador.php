<?php
/**
 * Created by PhpStorm.
 * User: DIAZ
 * Date: 15/05/2015
 * Time: 10:44 PM
 */
require_once 'EntidadTickets.php';
$tike_old = Tickets::buscarPorId($_POST['id_tickets']);
$tick = new Tickets(
    $tike_old->getPrioridad(),
    $tike_old->getSO(),
    $tike_old->getAsunto(),
    $tike_old->getDetalle(),
    'NUEVO',
    $_POST['id_usrEncargado'],
    '',
    $tike_old->getIdCreador(),
    $_POST['id_tickets']);
$tick->guardar();
header("location:../../vistas_admin/index.php?");