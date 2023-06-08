<?php

require_once './BladeOne-4.9/config.php';
require_once './DB/roomManager.php';
require_once './utils/helpObjects.php';
require_once './utils/functions.php';

$currentPage = 1;
$order = null;
$baseUrl = 'roomsGrid.php?';
$query = parse_url($_SERVER['REQUEST_URI'])['query'];
//prettyPrint($query);
if (isset($query)) {
    $querys = explode("&", $query);
    $format_query = [];
    foreach ($querys as $query) {
        $queryArr = explode("=", $query);
        $format_query[$queryArr[0]] = +$queryArr[1];
    }
    if ($format_query['page']) {
        $currentPage = $format_query['page'];
    }
    if ($format_query['priceOrder']) {
        $order = $format_query['priceOrder'];
        $baseUrl .= "priceOrder={$order}&";
    }
    //$currentPage = +explode("=", $query)[1];
}
//prettyPrint([$currentPage, $order]);
$roomsData = $roomManager->getAllRooms(6, $currentPage, $order);
$rooms = $roomsData['rooms'];
$totalPages = $roomsData['totalPages'];

echo $blade->run('roomsGrid', ['rooms' => $rooms, 'pages' => $totalPages, 'currentPage' => $currentPage, 'baseUrl' => $baseUrl, 'icons' => $icons]);
