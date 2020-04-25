<?php

require '../config/dev.php';
require '../vendor/autoload.php';
session_start();

$router = new \Blog\config\Router();
$router->run();