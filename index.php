<?php

require_once './BladeOne-4.9/config.php';
require_once './DB/roomManager.php';
require_once './utils/helpObjects.php';
require_once './utils/functions.php';

$rooms = $roomManager->getAllRooms(8, 1)['rooms'];

echo $blade->run("index", array('rooms' => $rooms, 'icons' => $icons, 'facilities' => $facilities, 'menues' => $menues));
