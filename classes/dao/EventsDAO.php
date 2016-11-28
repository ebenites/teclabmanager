<?php

class EventsDAO {
    
    public static function tolist() {
        
        $con = Connection::getConnection();
        
        
        $sql = "select e.id, e.title, e.start, e.end, e.rooms_id, s.name as rooms_name, e.users_id, u.fullname as users_fullname
                from events e
                inner join rooms s on s.id = e.rooms_id
                inner join users u on u.id = e.users_id";
        $stmt = $con->prepare($sql);
        
        $stmt->execute();
        
        $lista = array();
        while($registro = $stmt->fetchObject('Event')){
            $lista[] = $registro;
        }

        return $lista;
    }
    
    public static function register($event) {
        
        $con = Connection::getConnection();
        
        $sql = "INSERT INTO events (users_id, rooms_id, title, start, end) "
                . "VALUES (:users_id, :rooms_id, :title, :start, :end)";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':users_id', $event->users_id);
        $stmt->bindParam(':rooms_id', $event->rooms_id);
        $stmt->bindParam(':title', $event->title);
        $stmt->bindParam(':start', $event->start);
        $stmt->bindParam(':end', $event->end);
        
        $stmt->execute();
    }
    
}

?>
