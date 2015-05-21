<?php
/**
 * Created by PhpStorm.
 * User: DIAZ
 * Date: 18/05/2015
 * Time: 10:49 PM
 */
require_once '../../Comun/Tickets.php';
$registro = Tickets::buscarPorIdCreador('18');
if($registro){
}else{
    echo 'El personaje no ha podido ser encontrado';
}