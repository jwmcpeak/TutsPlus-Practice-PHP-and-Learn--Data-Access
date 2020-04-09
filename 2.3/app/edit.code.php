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


}



$stmt = null;
$db = null;

//header('Location: index.php');