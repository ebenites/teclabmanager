<?php
require_once './autoload.php';
try {
    
    $id = $_GET['id'];
    $state = $_GET['state'];
    
    EventsDAO::cambiarEstado($id, $state);
    
    if(state==1){
        Flash::success('Estado de registro actualizado');
    } else if(state == 2){
        Flash::warning('Solicitud rechazada');
    }
    header('location:reservas.php');
    
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}
