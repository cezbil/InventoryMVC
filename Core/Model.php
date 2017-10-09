<?php
namespace Core;
use PDO;
use App\Config;

abstract class Model
{

    protected static function getDB()
    {
        static $db = null;
        if ($db === null) {
            $dbUser = 'root';
            $dbPassword = '';
            $dsn = "mysql:host=localhost;dbname=inventory;";
            $db = new PDO($dsn, $dbUser, $dbPassword);

            try {
                $db = new PDO($dsn, $dbUser, $dbPassword);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $db;

            } catch (PDOException $e) {
                echo $e->getMessage();
            }


        }
        return $db;
    }
}