<?php
/**
 * https://teclabmanager-ebenites.c9users.io/access-ws.php?codigo=104679&dni=01456824&room=701
 * */
require_once 'autoload.php';
try{
    $codigo = $_GET['codigo']; // Cod alumno/docente
    $dni = $_GET['dni']; // dni alumno/docente
    $room = $_GET['room']; // num lab
    
    // validar usuario
    $user = UsuarioDAO::validarCodigo($codigo, $dni);
    if($user==NULL)
        throw new Exception("Usuario incorrecto");
    
    // Si el alumno/docente tiene permiso de acceso en el $room en este momento
    $event = EventsDAO::validarAcceso($codigo, $room);
    if($event==NULL)
        throw new Exception("No tiene acceso");
    
    echo "{OK Bienvenido ".$user->fullname."}";

}catch(Exception $e){
    echo "{ER ".$e->getMessage()."}";
}