<?php

namespace App\Table;
use App\Application;
use App\Exception\Table\TableException;
use App\Exception\Table\User\LoginException;

class Users extends Table {

  public static $columns = "( `id` INT NOT NULL AUTO_INCREMENT , `login` VARCHAR NOT NULL , `password` VARCHAR NOT NULL , PRIMARY KEY (`id`))";

  public static function find_user_by_login($login)
  {
    $result = static::find_by_attribute('login', $login);
    if (count($result) == 1)
    {
      return $result;
    }
    else if (count($result) > 1)
    {
      throw new TableException("Several results for find by login : $login, but login must be unique");
    }
    else
    {
      throw new LoginException("Login not found : $login");
    }
  }

  public static function user_connexion($login, $password)
  {
    $result = Application::getDb()->prepareselect("SELECT * FROM " . static::getTable() . " WHERE login = ? AND password = ?",
                                                  [$login, $password],
                                                  get_called_class());
    if (count($result) == 1)
    {
      return $result;
    }
    else if (count($result) > 1)
    {
      throw new TableException("Several results for user connexion : $login, but user must be unique");
    }
    else
    {
      throw new LoginException("Login not found : $login");
    }
  }


}
