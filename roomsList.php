<?php

require_once './BladeOne-4.9/config.php';
require_once './DB/roomManager.php';
require_once './utils/helpObjects.php';
require_once './utils/functions.php';

$roomDetailLink;
$baseUrl = "roomsList.php?";
$orderUrl = '';
$dateUrl = '';

$currentPage = 1;
$order = null;
$targetCheckIn = '';
$targetCheckOut = '';

$queryUrl = parse_url($_SERVER['REQUEST_URI'])['query'];

if (isset($queryUrl)) {
    $querys = explode("&", $queryUrl);
    foreach ($querys as $query) {
        $queryArr = explode("=", $query);
        if ($queryArr[0] === 'page') {
            $currentPage = +$queryArr[1];
        }
        if ($queryArr[0] === 'arrivalDate') {
            $targetCheckIn = $queryArr[1];
        }
        if ($queryArr[0] === 'departureDate') {
            $targetCheckOut = $queryArr[1];
        }
        if ($queryArr[0] === 'priceOrder') {
            $order = +$queryArr[1];
            $orderUrl = "priceOrder={$order}&";
        }
    }
}

if ($targetCheckIn && $targetCheckOut) {
    $dateUrl = "arrivalDate={$targetCheckIn}&departureDate={$targetCheckOut}&";
    $roomDetailLink = "roomDetails.php?in={$targetCheckIn}&out={$targetCheckOut}&";
    $roomsData = $roomManager->getAvailableRooms($targetCheckIn, $targetCheckOut, $currentPage, $order);
} else {
    $roomsData = $roomManager->getAvailableRooms();
    $roomDetailLink = "roomDetail.php?";
}

$rooms = $roomsData['rooms'];
$totalPages = $roomsData['totalPages'];
$urlToLink = $baseUrl . $dateUrl . $orderUrl;

echo $blade->run('roomsList', [
    'rooms' => $rooms,
    'pages' => $totalPages,
    'checkIn' => $targetCheckIn,
    'checkOut' => $targetCheckOut,
    'currentPage' => $currentPage,
    'urlToLink' => $urlToLink,
    'icons' => $icons,
    'roomDetailLink' => $roomDetailLink
]);

//isset($_GET['arrivalDate']) && isset($_GET['departureDate'])