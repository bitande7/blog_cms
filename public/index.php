<?php

define( 'ROOT', dirname(dirname(__FILE__)) );
define( 'DS',DIRECTORY_SEPARATOR);

require ROOT . '/App/config/config.php';
require ROOT.'/App/config/autoload.php';



\App\Core\Router::dispatch();


