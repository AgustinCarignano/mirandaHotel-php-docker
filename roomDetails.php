<?php

require_once './BladeOne-4.9/config.php';
require_once './DB/roomManager.php';
require_once './utils/helpObjects.php';
require_once './utils/functions.php';
require_once 'DB/bookingManager.php';

$booking = [
    'checkIn' => '',
    'checkOut' => '',
    'guest' => '',
    'email' => '',
    'phone' => '',
    'message' => '',
    'roomId' => '',
];

$inpuptErrors = [
    'checkIn' => false,
    'checkOut' => false,
    'guest' => false,
    'email' => false,
    'phone' => false,
];
$hasError = false;
$posted = false;
$postMessage = '';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $isAllValid = true;
    foreach ($_POST as $key => $value) {
        $data = filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
        if ($data || $key === 'message') {
            $booking[$key] = $data;
        } else {
            $inpuptErrors[$key] = true;
            $isAllValid = false;
        }
    }
    if ($isAllValid) {
        $isAvailable = $roomManager->checkAvailability($booking['roomId'], $booking['checkIn'], $booking['checkOut']);
        if ($isAvailable) {
            $bookingManager->createBooking($booking);
            $postMessage = $bookingMessage['success'];
            foreach ($booking as $k => $v) {
                if ($k !== "roomId") $booking[$k] = '';
            }
            $posted = true;
        } else {
            $postMessage = $bookingMessage['notAvailable'];
            $posted = true;
        }
    } else $hasError = true;
} else {
    $querys = explode("&", parse_url($_SERVER['REQUEST_URI'])['query']);
    if (isset($querys)) {
        foreach ($querys as $query) {
            if (str_contains($query, 'in')) {
                $booking['checkIn'] = explode("=", $query)[1];
                continue;
            }
            if (str_contains($query, 'out')) {
                $booking['checkOut'] = explode("=", $query)[1];
                continue;
            }
            if (str_contains($query, 'id')) {
                $booking['roomId'] = explode("=", $query)[1];
                continue;
            }
        }
    }
}

$relatedRooms = $roomManager->getAllRooms(3, 4)['rooms'];


if ($booking['roomId']) {
    $room = $roomManager->getRoom($booking['roomId']);
    $presentationPrice = $room['offer'] === 1 ? "pageDetailsPresentation__prices offerPrice" : "pageDetailsPresentation__prices";
    echo $blade->run("roomDetails", [
        "room" => $room,
        'booking' => $booking,
        'inputErrors' => $inpuptErrors,
        'hasError' => $hasError,
        'sentForm' => $posted,
        'postMessage' => $postMessage,
        'amenities' => $amenities,
        'classOfferPrice' => $presentationPrice,
        'icons' => $icons,
        'relatedRooms' => $relatedRooms
    ]);
} else {
    header("Location: /");
    die();
}
