<?php

class Event {
    
    public function getEstado() {
        return $this->state == 1?"Activo":"Inactivo";
    }
    
}
