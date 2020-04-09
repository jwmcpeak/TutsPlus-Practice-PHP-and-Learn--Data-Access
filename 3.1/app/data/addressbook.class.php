<?php

class AddressBook {
    
    public static function all() {
        $db = self::connect();

        $query = $db->query('SELECT * FROM people ORDER BY last_name');
        $model = $query->fetchAll();

        $query = null;
        $db = null;

        return $model;
    }

    public static function create($first_name, $last_name, $email) {
        $db = self::connect();
        
        $sql = 'INSERT INTO people (first_name, last_name, email) VALUES (:first_name, :last_name, :email)';
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':email' => $email
        ]);

        $stmt = null;
        $db = null;
    }

    public static function delete($id) {
        $db = self::connect();

        $stmt = $db->prepare('DELETE FROM people WHERE id = :id');
        $stmt->execute([   
            ':id' => $id
        ]);

        $stmt = null;
        $db = null;
    }

    public static function single($id) {
        $db = self::connect();

        $stmt = $db->prepare('SELECT * FROM people WHERE id = :id');
        $stmt->execute([
            ':id' => $id
        ]);

        $model = $stmt->fetch();

        $stmt = null;
        $db = null;

        return $model;
    }

    public static function update($id, $first_name, $last_name, $email) {
        $db = self::connect();

        $stmt = $db->prepare('UPDATE people SET first_name = :first_name, last_name = :last_name, email = :email WHERE id = :id');
        $stmt->execute([
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':email' => $email,    
            ':id' => $id
        ]);

        $stmt = null;
        $db = null;
    }


    private static function connect() {
        return new PDO(
            'mysql:dbname=address_book;host=localhost;port=3306',
            'root',
            ''
        );
    }
}