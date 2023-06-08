<?php

require_once 'config.php';

class ContactManager extends DB_Manager
{
    public function postContact($contact)
    {
        $data = [];
        foreach ($contact as $value) {
            $data[] = $value;
        }
        $this->executeQuery('INSERT INTO contacts (fullName, email, phone, subject, message) VALUES (?,?,?,?,?)', ['type' => 'sssss', 'value' => $data]);
    }
}

$contactManager = new ContactManager($connection);
