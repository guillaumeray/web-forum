<?php

namespace App\Table;

use App\Application;
use App\Exception\Table\TableException;

// abstract parent class
class Table
{
      protected static $table; // only child class can access
      protected static $columns = null; // columns of the table

      // get table name from child class
      public static function getTable()
      {
          if (static::$table === null)
          {
              $class_name = explode('\\', get_called_class());
              static::$table = end($class_name);
          }
          return static::$table;
      }

    // get table columns
    public static function getColumns()
    {
        if (static::$columns === null)
        {
            throw new TableException("Table " . get_called_class() . " columns does not exist");
        }
        return static::$columns;
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
