<?php

namespace Config;

use PDO;

class Model
{
    protected static $table;

    public static function getConnection()
    {
        return Config::getConnection();
    }

    public static function all()
    {
        $connection = self::getConnection();
        $stmt = $connection->query("SELECT * FROM " . static::$table);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function find($id){
        $stmt = self::getConnection()->query("select * from " . static::$table . " where id = " . $id);

    }
    public static function delete($id){
        $stmt = self::getConnection()->query("delete from " . static::$table . " where id = " . $id);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }   
}

