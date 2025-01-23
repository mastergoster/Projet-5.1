<?php

class DBConnect
{
    /**
     * Instance of PDO
     *
     * @return PDO
     */
    public static function getPDO() : PDO
    {
        $pdo = new PDO('sqlite:database.db');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }



    /**
     * Initialize the database with a table and some data
     *
     * @return void
     */
    public static function init() : void
    {
        if (file_exists('database.db')) {
            unlink('database.db');
        }
        
        $pdo = new PDO('sqlite:database.db');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec('CREATE TABLE contact (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT,
            email TEXT,
            phone_number TEXT
        )');

        $datas = [
            ['name' => 'John Doe', 'email' => 'mail1@test.fr', 'phone_number' => '0123456789'],
            ['name' => 'Jane Doe', 'email' => 'mail2@test.fr', 'phone_number' => '9876543210'],
            ['name' => 'Foo Bar', 'email' => 'mail3@test.fr', 'phone_number' => '1234567890'],
            ['name' => 'Baz Qux', 'email' => 'mail4@test.fr', 'phone_number' => '0987654321'],
        ];

        $stmt = $pdo->prepare('INSERT INTO contact (name, email, phone_number) VALUES (:name, :email, :phone_number)');
        foreach ($datas as $data) {
            $stmt->execute($data);
        }
    }
}