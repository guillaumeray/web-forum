<?php

namespace App\Table;
use App\Exception\Table\TableException;
use App\Exception\Table\Room\RoomException;

class Room extends Table {

  public static function find_room_by_name($name)
  {
    $result = static::find_by_attribute('name', $name);
    if (count($result) == 1)
    {
      return $result;
    }
    else if (count($result) > 1)
    {
      throw new TableException("Several results to find a room by name : $name, but room name must be unique");
    }
    else
    {
      throw new RoomException("Room not found : $name");
    }
  }


}
