<?php

class DB
{
    private static PDO $pdo;

    public static function getConnection()
    {
        return self::$pdo;
    }
    public static function setup(string $dsn, string $db_user, string $db_pass)
    {
        self::$pdo = new PDO($dsn, $db_user, $db_pass);
        return self::$pdo;
    }
    public static function dispense(string $table)
    {
        //$entityColumns = self::$pdo->prepare("SHOW COLUMNS :table")->execute([':table' => $table]);
        //var_dump($entityColumns);
    }

    public static function store($user)
    {
    }

    public static function load(string $string, $userId)
    {

    }

    public static function trash($user)
    {
    }

    public static function count(string $string, string $string1, array $array)
    {
    }

    public static function findOne(string $string, string $string1, array $array)
    {
    }


    public static function close()
    {
    }
}