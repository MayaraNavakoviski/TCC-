<?php

define('DEV_ENVIRONMENT', true);

if (DEV_ENVIRONMENT) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('APP_NAME', 'mvc_creator');
define('URL_BASE', 'http://localhost:8080');

define('DB_HOST', 'localhost');
define('DB_NAME', 'mvc_creator');
define('DB_USER', 'root');
define('DB_PASS', '');
