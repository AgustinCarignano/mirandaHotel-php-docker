<?php

require_once 'config.php';

class RoomManager extends DB_Manager
{
    public function getAllRooms($limit = 6, $page = 1, $order = null)
    {
        $extra_q = '';
        if ($order) {
            $safe_query = $order === 1 ? 'ASC' : ($order === -1 ? 'DESC' : '');
            $extra_q = "order by price $safe_query";
        }
        $offset = ($page - 1) * $limit;
        $totalRowsResult = $this->executeQuery('SELECT COUNT(_id) FROM rooms');
        $totalPages = ceil($totalRowsResult->fetch_assoc()['COUNT(_id)'] / $limit);
        $result = $this->executeQuery("select * from rooms $extra_q limit $limit offset $offset");
        $rooms = $this->sanitizateRoom($result);
        return ['rooms' => $rooms, 'totalPages' => $totalPages];
    }

    public function getRoom($id)
    {
        try {
            $result = $this->executeQuery("select * from rooms where _id = ?", ['type' => 'i', 'value' => [$id]]);
            if ($result->num_rows) {
                return $this->sanitizateRoom($result)[0];
            } else {
                throw new Error('404: Room not found');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getOfferRooms()
    {
        $result = $this->executeQuery('select * from rooms where offer=true');
        return $this->sanitizateRoom($result);
    }

    public function getAvailableRooms($in = "2000-1-1", $out = "2030-12-31", $page = 1, $order = null)
    {
        $query_occupiedRooms = "select roomId from bookings where 
            checkIn > ? and checkIn < ? or 
            checkOut > ? and checkOut < ? or
            checkIn > ? and checkOut < ? or
            checkIn < ? and checkOut > ?";
        $ocuppied_result = $this->executeQuery($query_occupiedRooms, ['type' => 'ssssssss', 'value' => [$in, $out, $in, $out, $in, $out, $in, $out]]);
        if ($ocuppied_result->num_rows === 0) return $this->getAllRooms(6, $page, $order);
        for ($ocuppiedRooms = array(); $row = $ocuppied_result->fetch_assoc(); $ocuppiedRooms[] = $row['roomId']);
        $length = count($ocuppiedRooms);
        $totalRowsResult = $this->executeQuery('SELECT COUNT(_id) FROM rooms');
        $totalPages = ceil(($totalRowsResult->fetch_assoc()['COUNT(_id)'] - $length) / 6);
        $offset = ($page - 1) * 6;
        $extra_q = '';
        if ($order) {
            $safe_query = $order === 1 ? 'ASC' : ($order === -1 ? 'DESC' : '');
            $extra_q = "order by price $safe_query";
        }
        $query_availables = "select * from rooms where _id not in (" . str_repeat("?, ", $length - 1) . "?) $extra_q limit 6 offset $offset";
        $available_result = $this->executeQuery($query_availables, ['type' => str_repeat('i', $length), 'value' => $ocuppiedRooms]);
        $availableRooms = $this->sanitizateRoom($available_result);
        return ['rooms' => $availableRooms, 'totalPages' => $totalPages];
        return $availableRooms;
    }

    public function checkAvailability($roomId, $in, $out)
    {
        $availables = $this->getAvailableRooms($in, $out);
        $isAvailable = false;
        foreach ($availables as $room) {
            if ($room['_id'] == $roomId) $isAvailable = true;
        }
        return $isAvailable;
    }

    private function sanitizateRoom($data)
    {
        for ($formatData = array(); $row = $data->fetch_assoc(); $formatData[] = $row) {
            $row['amenities'] = explode(',', $row['amenities']);
            $row['photos'] = explode(',', $row['photos']);
        }
        return $formatData;
    }
}

$roomManager = new RoomManager($connection);
