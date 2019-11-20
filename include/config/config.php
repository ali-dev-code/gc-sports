<?php ob_start();
session_start();


defined("DS") ? null : define("DS" , DIRECTORY_SEPARATOR);

defined("CONFIG") ? null : define("CONFIG",  __DIR__ . DS . "");


require_once 'db.php';
require_once 'functions.php';



 ?>
