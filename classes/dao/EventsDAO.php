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
    
    public static function cantidadReservas(){
       
        $con = Connection::getConnection();
        
        $sql = "select count(rooms_id) as numero_reservas, rooms_id as salones
                from events 
                where state =  '1'
                group by rooms_id";

        $stmt = $con->prepare($sql);
        $stmt->execute();
        
        $lista = array();
        while($registro = $stmt->fetchObject('Event')){
            $lista[] = $registro;
        }

        return $lista;
                
    }
    
    public static function cantidadUso(){
       
        $con = Connection::getConnection();
        
        $sql = "select id, title, start, end, rooms_id, 
                TIMESTAMPDIFF(MINUTE, start, end) as difference
                from events where state='1' and start > '2018-01-22' and start < '2018-01-28'";

        $stmt = $con->prepare($sql);
        $stmt->execute();
        
        $lista = array();
        while($registro = $stmt->fetchObject('Event')){
            $lista[] = $registro;
        }

        return $lista;
                
    }
    
    public static function reporteUso($room_id, $start, $end){
       
        $start = $start."T00:00";
        $end = $end."T23:59";
       
        $con = Connection::getConnection();
        
        $sql = "select id, title, start, end from events where state='1' and rooms_id=:rooms_id and STR_TO_DATE(start, '%Y-%m-%dT%H:%i') > STR_TO_DATE(:start, '%Y-%m-%dT%H:%i') and STR_TO_DATE(start, '%Y-%m-%dT%H:%i') < STR_TO_DATE(:end, '%Y-%m-%dT%H:%i') order by start";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(':rooms_id', $room_id);
        $stmt->bindParam(':start', $start);
        $stmt->bindParam(':end', $end);
        $stmt->execute();
        
        $eventos = array();
        while($registro = $stmt->fetchObject('Event')){
            $registro->startDate = new DateTime($registro->start);
            $registro->endDate = new DateTime($registro->end);
            $eventos[$registro->startDate->format('Y-m-d')][] = $registro;    // agrupar los eventos por día
        }
        //var_dump($eventos);

        $reporte['total'] = 0;
        $reporte['total-uso'] = 0;
        $reporte['total-desuso'] = 0;
        $reporte['total-muerto'] = 0;
        
        $tiempoMinimoMuerto = 120;

        $firstDay = new DateTime($start);
        $endDay = new DateTime($end);
        $endDay->add(new DateInterval("P1D"));
        
        //Calcular el total
        $diasXsemana = $firstDay->diff($endDay)->d; // $endDay - $firstDay
        $startHour = 8; // hora inicio del día
        $endHour = 21; // hora fin del día
        
        $reporte['total'] = $diasXsemana*($endHour-$startHour)*60;;
        
        // Cálculo de uso, desuso y muerto
        foreach($eventos as $dia => $listaXdia){
            foreach($listaXdia as $i => $evento){
                // Total de desuso o tiempo muerto
                if($i==0){  // El primer evento del día
                    $startDay = clone $evento->startDate;
                    $startDay->setTime($startHour, 0);
                    $diff = $startDay->diff($evento->startDate);
                    $evento->minStartDiff = $diff->h*60 + $diff->i;
                }else{  // El resto de eventos del día
                    $diff = $listaXdia[$i-1]->endDate->diff($evento->startDate);
                    $evento->minStartDiff = $diff->h*60 + $diff->i;
                }
                if($evento->minStartDiff < $tiempoMinimoMuerto){
                    $reporte['total-muerto'] += $evento->minStartDiff;
                }else{
                    $reporte['total-desuso'] += $evento->minStartDiff;
                }
                if($i==count($listaXdia)-1){   // El último evento del día
                    $endDay = clone $evento->endDate;
                    $endDay->setTime($endHour, 0);
                    $diff = $evento->endDate->diff($endDay);
                    $evento->minEndDiff = $diff->h*60 + $diff->i;
                    if($evento->minEndDiff < $tiempoMinimoMuerto){
                        $reporte['total-muerto'] += $evento->minEndDiff;
                    }else{
                        $reporte['total-desuso'] += $evento->minEndDiff;
                    }
                }
                // Total de uso
                $diff = $evento->startDate->diff($evento->endDate);
                $evento->rangeDiff = $diff->h*60 + $diff->i;
                $reporte['total-uso'] += $evento->rangeDiff;
            }
        }

        // Adicionando días que no existe eventos a la semana
        $reporte['total-desuso'] += ($diasXsemana-count($eventos))*($endHour-$startHour)*60;

        //var_dump($reporte);

        return $reporte;
                
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
    
    public static function validarAcceso($code, $room) {
        
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
        $stmt->bindParam(':room', $room);
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
