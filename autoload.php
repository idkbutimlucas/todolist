<?php
define('HOME_PATH', __DIR__);
define('HOME_URL', 'http://' . $_SERVER['HTTP_HOST'] . substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], "/")));

function classLoader($className)
{
    require 'classes/' . $className . '.php';
}

spl_autoload_register('classLoader');

require HOME_PATH . '/classes/fonction.php';

session_start();
