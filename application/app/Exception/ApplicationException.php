<?php

namespace App\Exception;

class ApplicationException extends BaseException
{

  public function __construct($message)
  {
    parent::__construct(get_called_class() . ' :: ' . $message . '<br \>');
  }

}
