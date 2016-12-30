<?php

namespace App\Exception\Table;

use App\Exception\BaseException;

class TableException extends BaseException
{

  public function __construct($message)
  {
    parent::__construct(get_called_class() . ' :: ' . $message . '<br \>');
  }

}
