<?php
require_once './autoload.php';
try {
    
    $id = $_GET['id'];
    $state = $_GET['state'];
    
    EventsDAO::cambiarEstado($id, $state);
    
    if($state==1){
        //Mandar correo de aceptación
        // ...
        $users = UsuarioDAO::listarAdministradores();
        foreach($users as $user){
            mail($user->email, 'Reserva de Laboratorio', 'Su solicitud de reserva de laboratorio fue aceptada '.$event->rooms_id.'. \nInicio:'.$event->start.'\nFin:'.$event->end, 'From: teclabmanager@tecsup.edu.pe' . "\r\n");
        }
        
        Flash::success('Estado de registro actualizado');
    } else if($state==2){
        // Mandar correo de rechazo
        // ...
        
            mail($user->email, 'Reserva de Laboratorio', 'Su solicitud de reserva de laboratorio fue rechazada '.$event->rooms_id.'. \nInicio:'.$event->start.'\nFin:'.$event->end, 'From: teclabmanager@tecsup.edu.pe' . "\r\n");
        
        
        Flash::warning('Solicitud rechazada');
    }
    
    header('location:reservas.php');
    
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}
