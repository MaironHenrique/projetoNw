<?php

//exibe os erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBANAME', 'pnw');

$conn = new PDO('mysql:host=' . HOST . ';dbname=' . DBANAME . ';', USER, PASS);
