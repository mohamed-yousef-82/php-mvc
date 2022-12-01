<?php
 namespace PHPMVC;
// if(!define(DS)){
//   define('DS',DIRECTORY_SEPARATOR);
// }
use PHPMVC\LIB\FrontController;
require_once 'app'.DIRECTORY_SEPARATOR.'config.php';
require_once APP_PATH.DS.'lib'.DS.'autoload.php';
session_start();
$frontcontroller = new FrontController();
$frontcontroller ->dispatch();
?>

