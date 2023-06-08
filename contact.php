<?php

require_once './BladeOne-4.9/config.php';
require_once './DB/roomManager.php';
require_once './utils/helpObjects.php';
require_once './utils/functions.php';
require_once './DB/contactManager.php';

$contact = ['fullName' => '', 'email' => '', 'phone' => '', 'subject' => '', 'message' => ''];
$input_error = ['fullName' => false, 'email' => false, 'phone' => false, 'subject' => false, 'message' => false];
$post_error = false;
$success_post = false;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $isCorrectForm = true;
    foreach ($_POST as $key => $value) {
        $contact[$key] = $value;
        if (!$value) {
            $input_error[$key] = true;
            $isCorrectForm = false;
            $post_error = true;
        }
    }
    if ($isCorrectForm) {
        $sanitizateContact = [];
        foreach ($contact as $key => $value) {
            $sanitizateContact[$key] = filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
        }
        $contactManager->postContact($sanitizateContact);
        foreach ($contact as $key => $value) {
            $contact[$key] = '';
        }
        $post_error = false;
        $success_post = true;
    }
}

echo $blade->run("contact", ['contact' => $contact, 'inputErrors' => $input_error, 'formSent' => $success_post, 'hasError' => $post_error]);
