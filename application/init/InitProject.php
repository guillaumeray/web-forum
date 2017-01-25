<?php

namespace Init;

use \PDO;
use App\Config;
use App\Table\Articles;
use App\Table\Messages;
use App\Table\Room;
use App\Table\Users;

class InitProject {

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct(Config $config) {
        $this->db_user = $config->get_settings()['db_user'];
        $this->db_pass = $config->get_settings()['db_pass'];
        $this->db_host = $config->get_settings()['db_host'];
        $this->db_name = $config->get_settings()['db_name'];
    }

    // get pdo only if necessary
    private function getPDO() {
        if ($this->pdo === null){
            $this->pdo = new PDO("mysql:dbname=$this->db_name;host=$this->db_host", $this->db_user, $this->db_pass);
        }
        return $this->pdo;
    }

    public function createAllTable()
    {
        $table_list = array($articles = new Articles(),
                            $messages = new Messages(),
                            $room = new Room(),
                            $users = new Users());

        foreach ($table_list as $table)
        {
            if ($this->is_table_exist($table::getTable()) == false)
            {
                $this->create_table($table::getTable(), $table::getColumns());
            }
        }
    }

    public function create_table($tablename, $columns)
    {
        $createTable = $this->getPDO()->exec("CREATE TABLE $this->db_name.$tablename $columns");
        if ($createTable)
        {
            echo "Table $tablename created";
        }
        else
        {
            throw new \Exception("Table $tablename can not be created");
        }
    }

    public function is_table_exist($tablename)
    {
        try
        {
            $result = $this->getPDO()->query("SELECT 1 FROM $this->db_name.$tablename LIMIT 1");
        }
        catch (\Exception $e)
        {
            // We got an exception == table not found
            return false;
        }
        return true;
    }
}

