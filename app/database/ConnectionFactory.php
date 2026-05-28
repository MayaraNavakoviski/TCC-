<?php

namespace app\database;

use Exception;
use PDO;

class ConnectionFactory
{
    private static ?PDO $connection = null;

    public static function getConnection(): PDO
    {
        if (self::$connection === null) {

            try {
                $dsn              = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";
                self::$connection = self::createConnection($dsn);

            } catch (Exception $e) {
                print "Não foi possível acessar o banco: " . DB_NAME;
                print "<br>Erro: " . $e->getMessage();
                die;
            }
        }

        return self::$connection;
    }

    private static function createConnection(string $dsn): PDO
    {
        $connection = new PDO($dsn, DB_USER, DB_PASS);
        $connection->setAttribute(PDO::ATTR_ERRMODE,            PDO::ERRMODE_EXCEPTION);
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $connection;
    }
}
