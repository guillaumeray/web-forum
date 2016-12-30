<?php

namespace App\Table;

use App\Application;

// abstract parent class
class Table
{
  protected static $table; // only child class can access

  // get table name from child class
  protected static function getTable()
  {
    if (static::$table === null)
    {
      $class_name = explode('\\', get_called_class());
      static::$table = end($class_name);
    }
    return static::$table;
  }

  public static function all()
  {
    return Application::getDb()->query("SELECT * FROM " . static::getTable(), get_called_class());
  }

  public static function find($id)
  {
    return Application::getDb()->prepareselect("SELECT * FROM " . static::getTable() . " WHERE id = ?",
                                              [$id],
                                              get_called_class());
  }

  public static function find_by_attribute($attributename, $attributevalue)
  {
    return Application::getDb()->prepareselect("SELECT * FROM " . static::getTable() . " WHERE $attributename = ?",
                                              [$attributevalue],
                                              get_called_class());
  }

}
