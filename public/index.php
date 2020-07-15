<?php

ini_set('display_errors', 1);

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
define('VIEWS_PATH', ROOT.DS.'resources'.DS.'views');

require_once(ROOT.DS.'app'.DS.'Core'.DS.'init.php');

App::run($_SERVER['REQUEST_URI']);
