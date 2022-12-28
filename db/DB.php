<?php

namespace db;

use PDO;

class DB
{
    static ?PDO $db = null;

    private function __construct(array $params)
    {
        $dsn = "mysql:dbname={$params['dbName']};host={$params['dbHost']}";
        self::$db = new PDO($dsn, $params['dbUser'], $params['dbPassword']);
    }

    static function connection($config = null): PDO
    {
        return self::$db ?: (new self($config))::$db;
    }
}