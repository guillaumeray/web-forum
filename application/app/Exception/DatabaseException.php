<?php

namespace App\Exception;

class DatabaseException extends BaseException
{

  public function __construct($message)
  {
    parent::__construct(get_called_class() . ' :: ' . $message . '<br \>');
  }

}
