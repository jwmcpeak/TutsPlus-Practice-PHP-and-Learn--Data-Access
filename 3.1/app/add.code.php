<?php

require('app.php');

if (is_get()) {
    return;
}

$first_name = filter_input(INPUT_POST, 'first-name', FILTER_SANITIZE_STRING);
$last_name = filter_input(INPUT_POST, 'last-name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if (strlen($email) === 0) {
    $email = NULL;
}

AddressBook::create($first_name, $last_name, $email);


header('Location: index.php');