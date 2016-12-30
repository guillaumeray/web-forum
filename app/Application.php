<?php

namespace App;

class Application {

    const DB_NAME = 'monsite';
    const DB_USER = 'root';
    const DB_PASS = 'root';
    const DB_HOST = 'localhost';

    private static $db;

    public static function getDb()
    {
      if (self::$db === null)
      {
        self::$db = new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);
      }
      return self::$db;
    }

}
