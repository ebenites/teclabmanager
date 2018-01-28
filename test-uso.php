<?php
require_once 'autoload.php';

$uso = EventsDAO::cantidadUso();
//var_dump($uso); 

//$minutos = [];
$start = [];
$end = [];
$start1 = [];
$end1 = [];

foreach($uso as $usos){
    $minutos[] = $usos->difference;
}

$suma = array_sum($minutos);


var_dump($minutos);
var_dump($suma); 

foreach($uso as $usos){
    $start [] = $usos->start; 
    $end [] = $usos->end; 
}

//var_dump($start);
//var_dump($end);

/*$fruit1 = array_shift($start);
print_r($start);

$fruit1 = array_pop($end);
print_r($end); */


//$inicios = [];

//Obtencion de todas las fechas de inicio (menos la primera) 

$shift = array_shift($start); // Etrae el primer elemento del array
$start1 = $start;

//var_dump($start1);

//Obtencion de todas las fechas de fin (menos la última)

//$pop= array_pop($end); //Extrae el elemento final del array
$end1 = $end;

//var_dump($end1);

$fecha = [];

//$fecha[] = $end1->diff($start1);

//var_dump($fecha);
