<?php

namespace App\Table;

use App\Application;
use App\Table\Room;
use App\Exception\Table\TableException;
use App\Exception\Table\Messages\MessagesException;

class Messages extends Table {

  public static $columns = "( `id` INT NOT NULL AUTO_INCREMENT , `room` INT NOT NULL , `login` VARCHAR NOT NULL , `message` MEDIUMTEXT NOT NULL , `date` DATETIME NOT NULL , PRIMARY KEY (`id`))";

  public static function get_messages_by_login($login)
  {
    $result = static::find_by_attribute('login', $login);
    if (count($result) == 0)
    {
      throw new MessagesException("No messages result for : $login");
    }
    return $result;
  }

  public static function get_messages_by_date($date)
  {
    $result = static::find_by_attribute('date', $date);
    if (count($result) == 0)
    {
      throw new MessagesException("No messages result for : $date->format('d-m-Y H:m')");
    }
    return $result;
  }

  public static function get_messages_by_room($room)
  {
    // find a room
    $roomid = Messages::get_room_id($room);
    // select messages by room id
    $result = Application::getDb()->query("SELECT * FROM Messages INNER JOIN Room WHERE Messages.room = $roomid",
                                          get_called_class());
    if (count($result) == 0)
    {
      throw new MessagesException("No messages result for : $room");
    }
    return $result;
  }

  public static function send_message($login, $room, $date, $message)
  {
    $roomid = Messages::get_room_id($room);
    $post = Application::getDb()->prepareinsert('INSERT INTO
                                                Messages (room, login, message, date)
                                                VALUES (?, ?, ?, ?)',
                                                [$roomid,
                                                 $login,
                                                 $message,
                                                 $date],
                                                'App\Table\Users');
    return $post;
  }

  private static function get_room_id($roomname)
  {
    try
    {
      $roomobject = Room::find_room_by_name($roomname);
    }
    catch (Exception $e)
    {
      throw new MessagesException($e->getMessage());
    }
    $roomid = $roomobject[0]->id;
    return $roomid;
  }

}
