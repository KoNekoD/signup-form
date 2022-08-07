<?php

// $log = date('Y-m-d H:i:s').'-'.file_get_contents('php://input');
// file_put_contents('infoLog.html', $log . PHP_EOL, FILE_APPEND);

// ini_set("log_errors", 1);
// ini_set("error_log", 'errorLog.txt');

// FRONT CONTROLLER 

// Общие настройки
ini_set('display_errors',1);
error_reporting(E_ALL);

session_start();

// Подключение файлов системы
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Autoload.php');

// Устанавливаем соединение с базой данных
Database::init();

// Вызов Router
$router = new Router();
$router->run();