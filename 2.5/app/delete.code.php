<?php

$db = new PDO(
    'mysql:dbname=address_book;host=localhost;port=3306',
    'root',
    ''
);


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    if (!$id) {
        $model = null;
        return;
    }

    $stmt = $db->prepare('SELECT * FROM people WHERE id = :id');
    $stmt->execute([
        ':id' => $id
    ]);

    $model = $stmt->fetch();
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

    $stmt = $db->prepare('DELETE FROM people WHERE id = :id');
    $stmt->execute([   
        ':id' => $id
    ]);
}

$stmt = null;
$db = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Location: index.php');
}