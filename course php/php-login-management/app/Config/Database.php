<?php

namespace Daudhidayatramadhan\LoginManagement\Config;
class Database
{
    private static ?\PDO $pdo = null;

    public static function getConnection(string $env = "test"): \PDO
    {
        if(self::$pdo == null)
        {
            require_once __DIR__.'/../../config/databse.php';
            $cofing = getDatabaseConfig();
            self::$pdo = new \PDO(
                $cofing['database'][$env]['url'],
                $cofing['database'][$env]['username'],
                $cofing['database'][$env]['password']
            );
        }else{
            return self::$pdo;
        }
    }
}