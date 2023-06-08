<?php

require_once 'config.php';
require_once 'roomManager.php';

class BookingManager extends DB_Manager
{
    public function createBooking($booking)
    {
        $this->executeQuery('INSERT INTO bookings (guest, specialRequest, orderDate, status, checkIn,checkOut,roomId) values (?,?,?,?,?,?,?)', [
            'type' => 'ssssssi',
            'value' => [
                $booking['guest'],
                $booking['message'],
                date("Y-m-d H:i:s"),
                'Check In',
                $booking['checkIn'],
                $booking['checkOut'],
                $booking['roomId']
            ]
        ]);
    }
}

$bookingManager = new BookingManager($connection);
