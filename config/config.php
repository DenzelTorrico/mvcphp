<?php

namespace Config;

use PDO;
use PDOException;

class Config
{
    private static $pdo;

    private const DB_HOST = 'localhost';
    private const DB_NAME = 'bikestores';
    private const DB_USER = 'root';
    private const DB_PASS = 'admin';

    public static function getConnection()
    {
        if (!self::$pdo) {
            self::connect();
        }

        return self::$pdo;
    }

    private static function connect()
    {
        try {
            self::$pdo = new PDO('mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME, self::DB_USER, self::DB_PASS);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }
    }
}

