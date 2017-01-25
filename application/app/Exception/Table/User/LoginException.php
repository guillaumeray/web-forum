<?php

namespace App\Exception\Table\User;

use App\Exception\Table\TableException;

class LoginException extends TableException
{

  public function __construct($message)
  {
    parent::__construct(get_called_class() . ' :: ' . $message . '<br \>');
  }


}
