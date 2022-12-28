<?php

require_once 'app/Autoloader.php';

use app\Autoloader;
use app\Router;
use db\DB;

Autoloader::register();
$config = require 'config.php';
$db = DB::connection($config['db']);
$route = new Router($config['route']);
$route->run();
