<?php

namespace Daudhidayatramadhan\LoginManagement\Config;
class Database
{
    private static ?\PDO $pdo = null;

    public static function getConnection(string $env = "test"): \PDO
    {
        if(self::$pdo == null) {
            require_once __DIR__ . '/../../config/database.php';
            $cofing = getDatabaseConfig();
            self::$pdo = new \PDO(
                $cofing['database'][$env]['url'],
                $cofing['database'][$env]['username'],
                $cofing['database'][$env]['password']
            );
        }
        return self::$pdo;
    }
    public static function  beginTransaction(){
        self::$pdo->beginTransaction();
    }
    public static  function commitTransaction(){
        self::$pdo->commit();
    }
    public  static  function rollbackTransaction(){
        self::$pdo->rollBack();
    }
}