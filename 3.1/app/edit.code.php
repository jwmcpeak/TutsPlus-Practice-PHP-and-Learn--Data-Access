<?php

require('app.php');


if (is_get()) {
    
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    if (!$id) {
        $model = null;
        return;
    }

    $model = AddressBook::single($id);

} else {
    $id = filter_input(INPUT_POST, 'person-id', FILTER_VALIDATE_INT);
    $first_name = filter_input(INPUT_POST, 'first-name', FILTER_SANITIZE_STRING);
    $last_name = filter_input(INPUT_POST, 'last-name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

    if (!$id) {
        $model = null;
        return;
    }

    AddressBook::update($id, $first_name, $last_name, $email);

    header('Location: index.php');
}