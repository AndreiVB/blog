<?php

/**
 * Database class
 * Connection to a sql database
 */
class Database
{
    public static $_instance;

    public function __construct()
    {
        //	Connecting to the database
        try {
            self::$_instance = new PDO(
                'mysql:host=db.3wa.io;dbname=andreiban_blog;charset=UTF8',
                'andreiban',
                'b4ec4973be404a08524bbaddac31329d',
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
            self::$_instance->exec('SET NAMES utf8mb4 COLLATE utf8mb4_general_ci');

            if (self::$_instance === null) {
                throw new PDOException("Connection error", 1);
            }
        } catch (PDOException $e) {
            echo "Error message : $e->getMessage() /n Error code : $e->getCode()";
        }
    }

    public function executeSql($sql, array $values = array()): int
    {
        $query = self::$_instance->prepare($sql);
        $query->execute($values);
        return self::$_instance->lastInsertId();
    }

    public function findAll($sql, array $criteria = array()): array
    {
        $query = self::$_instance->prepare($sql);
        $query->execute($criteria);
        return $query->fetchAll();
    }

    public function findOne($sql, array $criteria = array()): array
    {
        $query = self::$_instance->prepare($sql);
        $query->execute($criteria);
        return $query->fetch();
    }
}