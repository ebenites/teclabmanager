<?php
require_once 'autoload.php';

$events = EventsDAO::tolist();

echo json_encode($events);
