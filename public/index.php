<?php
define("BASEDIR",dirname(__DIR__));
define("CONFIG_PATH",BASEDIR."/config/");
include BASEDIR . '/vendor/autoload.php';


include BASEDIR."/bootstrap/Autoloader.php";
spl_autoload_register('Bootstrap\Autoload::autoload');

\Bootstrap\App::initialize(BASEDIR)->run();