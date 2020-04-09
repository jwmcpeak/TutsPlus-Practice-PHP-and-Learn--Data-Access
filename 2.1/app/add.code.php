<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    return;
}

$first_name = filter_input(INPUT_POST, 'first-name', FILTER_SANITIZE_STRING);
$last_name = filter_input(INPUT_POST, 'last-name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

if (strlen($email) === 0) {
    $email = NULL;
}

$db = new PDO(
    'mysql:dbname=address_book;host=localhost;port=3306',
    'root',
    ''
);

$sql = 'INSERT INTO people (first_name, last_name, email) VALUES (:first_name, :last_name, :email)';
$stmt = $db->prepare($sql);
$stmt->execute([
    ':first_name' => $first_name,
    ':last_name' => $last_name,
    ':email' => $email
]);

$stmt = null;
$db = null;

