<?php

$codigo = $_GET['codigo']; // Cod alumno/docente
$dni = $_GET['dni']; // dni alumno/docente
$room = $_GET['romm']; // num lab

// Si el alumno/docente tiene permiso de acceso en el $room en este momento

echo "{Error en la coneccion -> $codigo : $dni : $room}";