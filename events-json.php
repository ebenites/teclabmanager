<?php
require_once 'autoload.php';

$events = EventsDAO::tolistCalendario();

echo json_encode($events);
