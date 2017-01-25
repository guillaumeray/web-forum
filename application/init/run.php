<?php

// autoload class
require "../vendor/autoload.php";

use Init\InitProject;
use App\Config;

// get conf file
$config = new Config;
// init project with conf variables
$init = new InitProject($config);
// create all default tables
$init->createAllTable();
