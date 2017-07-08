<?php

//where e.state=0

class EventsDAO {
    
    public static function tolistCalendario() {
        
        $con = Connection::getConnection();
        
        
        $sql = "select e.id, e.title, e.start, e.end, e.rooms_id, s.name as rooms_name, e.users_id, u.fullname as users_fullname, state
                from events e
                inner join rooms s on s.id = e.rooms_id
                inner join users u on u.id = e.users_id
                where state=1
                order by state asc";
        $stmt = $con->prepare($sql);
        
        $stmt->execute();
        
        $lista = array();
        while($registro = $stmt->fetchObject('Event')){
            $lista[] = $registro;
        }

        return $lista;
    }
    
    public static function tolistPendientes() {
        
        $con = Connection::getConnection();
        
        
        $sql = "select e.id, e.title, e.start, e.end, e.rooms_id, s.name as rooms_name, e.users_id, u.fullname as users_fullname, state
                from events e
                inner join rooms s on s.id = e.rooms_id
                inner join users u on u.id = e.users_id
                where state=0
                order by start desc";
        $stmt = $con->prepare($sql);
        
        $stmt->execute();
        
        $lista = array();
        while($registro = $stmt->fetchObject('Event')){
            $lista[] = $registro;
        }

        return $lista;
    }
    
    public static function validarDisponibilidad($rooms_id, $start, $end) {
        
        $con = Connection::getConnection();
        
        
        $sql = "select * 
                from events 
                where state=1 and rooms_id=:rooms_id 
                and (
                    STR_TO_DATE(:start, '%Y-%m-%dT%H:%i') between STR_TO_DATE(start, '%Y-%m-%dT%H:%i') and STR_TO_DATE(end, '%Y-%m-%dT%H:%i') 
                    or 
                    STR_TO_DATE(:end, '%Y-%m-%dT%H:%i') between STR_TO_DATE(start, '%Y-%m-%dT%H:%i') and STR_TO_DATE(end, '%Y-%m-%dT%H:%i')
                )";
                
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':rooms_id', $rooms_id);
        $stmt->bindParam(':start', $start);
        $stmt->bindParam(':end', $end);
        $stmt->execute();
        
        if($registro = $stmt->fetchObject('Event')){
            return $registro;
        }

        return null;
    }
    
    public static function validarAcceso($code, $rom) {
        
        date_default_timezone_set('America/Lima');
        $date = date('Y-m-d H:i');
        
        $con = Connection::getConnection();
        
        $sql = "SELECT e.id, e.title, e.start, e.end, e.rooms_id, r.name AS rooms_name, e.users_id, u.fullname AS users_fullname, u.code AS user_code,state
            FROM events e
            INNER JOIN rooms r ON r.id = e.rooms_id
            INNER JOIN users u ON u.id = e.users_id
            WHERE u.code = :code
            AND r.name = :room
            and STR_TO_DATE(:date, '%Y-%m-%d %H:%i') between STR_TO_DATE(start, '%Y-%m-%dT%H:%i') and STR_TO_DATE(end, '%Y-%m-%dT%H:%i') ";
                
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':code', $code);
        $stmt->bindParam(':room', $rom);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
        
        if($registro = $stmt->fetchObject('Event')){
            return $registro;
        }

        return null;
    }
    
    public static function register($event) {
        
        $con = Connection::getConnection();
        
        $sql = "INSERT INTO events (users_id, rooms_id, title, start, end, state) "
                . "VALUES (:users_id, :rooms_id, :title, :start, :end, 0)";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':users_id', $event->users_id);
        $stmt->bindParam(':rooms_id', $event->rooms_id);
        $stmt->bindParam(':title', $event->title);
        $stmt->bindParam(':start', $event->start);
        $stmt->bindParam(':end', $event->end);
        
        $stmt->execute();
    }
    
    public static function cambiarEstado($id, $state) {
        
        $con = Connection::getConnection();
        
        $sql = "update events set state=:state where id = :id";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':state', $state);
        $stmt->execute();
        
    }
    
}

?>
