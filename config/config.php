<?php

namespace Config;

use PDO;
use PDOException;

class Config
{
    private static $instance = null;
    private $pdo;

    private const DB_HOST = 'localhost';
    private const DB_NAME = 'bikestores';
    private const DB_USER = 'root';
    private const DB_PASS = 'admin';

    /**
     * Constructor privado para evitar la creación directa de instancias
     */
    private function __construct()
    {
        $this->connect();
    }

    /**
     * Método para obtener la instancia singleton de la clase
     *
     * @return Config La instancia singleton de Config
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Método para obtener la conexión PDO
     *
     * @return PDO La conexión PDO
     */
    public function getConnection()
    {
        return $this->pdo;
    }

    /**
     * Método para establecer la conexión a la base de datos
     */
    private function connect()
    {
        try {
            $this->pdo = new PDO('mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME, self::DB_USER, self::DB_PASS);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }
    }
}
?>
