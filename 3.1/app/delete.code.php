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
    $delete = filter_input(INPUT_POST, 'delete', FILTER_SANITIZE_STRING);
    $cancel = filter_input(INPUT_POST, 'cancel', FILTER_SANITIZE_STRING);

    if (!$id) {
        $model = null;
        return;
    }

    if ($cancel) {
        header('Location: index.php');
        return;
    }

    AddressBook::delete($id);

    header('Location: index.php');
}