<?php

namespace App;

use App\Table\Articles;
use App\Table\Messages;
use App\Table\Room;
use App\Table\Table;
use App\Table\Users;

class Application {

    const DB_NAME = 'webforum';
    const DB_USER = 'root';
    const DB_PASS = 'root';
    const DB_HOST = 'db';

    private static $db;

    public static function getDb()
    {
      if (self::$db === null)
      {
        self::$db = new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);
      }

      return self::$db;
    }

    public static function createAllTable()
    {
        $articles = new Articles();
        $messages = new Messages();
        $room = new Room();
        $users = new Users();

        if ($articles->is_table_exist() == false)
        {
            $articles::create_table();
        }
        if ($messages->is_table_exist() == false)
        {
            $messages::create_table();
        }
        if ($room->is_table_exist() == false)
        {
            $room::create_table();
        }
        if ($users->is_table_exist() == false)
        {
            $users::create_table();
        }

        $all_table_created = true;
    }

}
