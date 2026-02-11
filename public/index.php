<?php
session_start();

use Dotenv\Dotenv;

require dirname(__DIR__) . "/vendor/autoload.php";

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

require dirname(__DIR__) . "/config/router.php";
