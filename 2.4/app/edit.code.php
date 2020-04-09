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
    $first_name = filter_input(INPUT_POST, 'first-name', FILTER_SANITIZE_STRING);
    $last_name = filter_input(INPUT_POST, 'last-name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

    if (!$id) {
        $model = null;
        return;
    }

    $stmt = $db->prepare('UPDATE people SET first_name = :first_name, last_name = :last_name, email = :email WHERE id = :id');
    $stmt->execute([
        ':first_name' => $first_name,
        ':last_name' => $last_name,
        ':email' => $email,    
        ':id' => $id
    ]);
}

$stmt = null;
$db = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Location: index.php');
}