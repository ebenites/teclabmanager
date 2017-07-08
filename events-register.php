<?php
require_once 'autoload.php';
try {
    
    $event = new Event();
    $event->users_id = $_POST['users_id'];
    $event->rooms_id = $_POST['rooms_id'];
    $event->title = $_POST['title'];
    $event->start = $_POST['start'];
    $event->end = $_POST['end'];
    
    // validar disponibilidad
    $exists = EventsDAO::validarDisponibilidad($event->rooms_id, $event->start, $event->end);
    if($exists){
        Flash::error('El ambiente no se encuentra disponible en el horario seleccionado');
        header('location: events-new.php');
        exit();
    }
    
    EventsDAO::register($event);
    
    // Enviar correo
    $admins = UsuarioDAO::listarAdministradores();
    foreach($admins as $admin){
        mail($admin->email, 'Reserva de Laboratorio', 'Tiene una solicitud de reserva pendiente para el ambiente '.$event->rooms_id.'. \nInicio:'.$event->start.'\nFin:'.$event->end, 'From: teclabmanager@tecsup.edu.pe' . "\r\n");
    }
    
    
    Flash::success('Reserva registrada satisfactoriamente');
    
    header('location: events-new.php');

} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}
