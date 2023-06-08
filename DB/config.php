<?php

require_once 'env.php';

$connection = new mysqli($DB['SERVER'], $DB['USER'], $DB['PASS'], $DB['NAME']);

abstract class DB_Manager
{
    public $conn;
    public function __construct($connIntance)
    {
        $this->conn = $connIntance;
    }

    public function executeQuery($query, $param = [])
    {
        $stmt = $this->conn->prepare($query);
        count($param) !== 0 && $stmt->bind_param($param['type'], ...$param['value']);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
}
