<?php

$db = new PDO(
    'mysql:dbname=address_book;host=localhost;port=3306',
    'root',
    ''
);

$query = $db->query('SELECT * FROM people ORDER BY last_name');
$model = $query->fetchAll();

$query = null;
$db = null;