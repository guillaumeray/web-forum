<?php

namespace App\Exception\Table\Messages;

use App\Exception\Table\TableException;

class MessagesException extends TableException
{

  public function __construct($message)
  {
    parent::__construct(get_called_class() . ' :: ' . $message . '<br \>');
  }


}
