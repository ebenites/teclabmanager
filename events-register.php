<?php
require_once 'autoload.php';

$event = new Event();
$event->users_id = $_POST['users_id'];
$event->rooms_id = $_POST['rooms_id'];
$event->title = $_POST['title'];
$event->start = $_POST['start'];
$event->end = $_POST['end'];

EventsDAO::register($event);

Flash::success('Reserva registrada satisfactoriamente');

header('location: events-new.php');
