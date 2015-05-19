<?php
/**
 * Created by PhpStorm.
 * User: DIAZ
 * Date: 18/05/2015
 * Time: 09:52 PM
 */
require_once '../../Comun/Usuario.php';
$personaje = Usuario::buscarPorCorreo('alguien@alguien.com');
if($personaje){
    echo $personaje->getNombre();
    echo '<br />';
    echo $personaje->getId();
}else{
    echo 'El personaje no ha podido ser encontrado';
}