<?php

namespace App\Table;

class Articles extends Table {

    public function __construct() {
      $this->number = 0;
    }

    public function getExtrait() {
      return substr($this->contenu, 10) . '...';
    }

}
