<?php

require_once './BladeOne-4.9/config.php';
require_once './DB/roomManager.php';
require_once './utils/helpObjects.php';
require_once './utils/functions.php';

$rooms = $roomManager->getOfferRooms();

$popularRooms = $roomManager->getAllRooms(3, 2)['rooms'];

echo $blade->run("offers", array("rooms" => $rooms, 'amenities' => $amenities, 'popularRooms' => $popularRooms)); // it calls /views/hello.blade.php
