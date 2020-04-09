<?php


require('data/addressbook.class.php');

function is_get() {
    return $_SERVER['REQUEST_METHOD'] === 'GET';
}

function is_post() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function encode($model) {
    foreach ($model as $key => $value) {
        $model[$key] = htmlspecialchars($value);
    }

    return $model;
}