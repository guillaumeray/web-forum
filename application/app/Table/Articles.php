<?php

namespace App\Table;

class Articles extends Table {

    public static $columns = "( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR NOT NULL , `titre` VARCHAR NULL , `description` MEDIUMTEXT NULL , `date` DATETIME NULL , PRIMARY KEY (`id`))";

    public function __construct() {
      $this->number = 0;
    }

    public function getExtrait() {
      return substr($this->contenu, 10) . '...';
    }

}
