<?php
error_reporting(E_ALL);
ini_set('display_errors',true);
ini_set('date.timezone','Europe/Moscow');

define("APP_DIR", dirname(__DIR__));
define("VIEW_DIR", APP_DIR . '/view/');

require_once 'vendor/autoload.php';
