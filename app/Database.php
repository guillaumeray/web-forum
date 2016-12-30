<?php

namespace App;

use \PDO;
use \Exception;

class Database {

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

   // define global db var in constructor, do not connect to db in instenciation
    public function __construct($db_name, $db_user, $db_pass, $db_host) {
      $this->db_name = $db_name;
      $this->db_user = $db_user;
      $this->db_pass = $db_pass;
      $this->db_host = $db_host;
      $this->db_name = $db_name;
    }

    // get pdo only if necessary
    private function getPDO() {
      if ($this->pdo === null){
          $this->pdo = new PDO("mysql:dbname=$this->db_name;host=$this->db_host", $this->db_user, $this->db_pass);
      }
      return $this->pdo;
    }

    // query to ask for
    public function query($statement, $classname)
    {
      $req = $this->getPDO()->query($statement);
      try
      {
        $result = $this->returnrequestresult($req, $classname);
        return $result;
      }
      catch (Exception $e)
      {
        echo $e->getMessage();
      }

    }

    // query to prepare
    public function prepareselect($statement, $attributes, $classname)
    {
      $req = $this->getPDO()->prepare($statement);
      $req->execute($attributes);

      try
      {
        $result = $this->returnrequestresult($req, $classname);
        return $result;
      }
      catch (Exception $e)
      {
        echo $e->getMessage();
      }

    }

    private function returnrequestresult($request, $classname)
    {
      // result number
      $result = $request->rowCount();

      if ($result >= 1)
      {
        $datas = $request->fetchAll(PDO::FETCH_CLASS, $classname);
        return $datas;
      }
      else
      {
        throw new Exception('no result from db<br \>');
      }
    }

    public function prepareinsert($statement, $attributes) {
      $req = $this->getPDO()->prepare($statement);
      $res = $req->execute($attributes);
      return $res;
    }

}
