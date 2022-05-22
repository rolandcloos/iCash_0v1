<?php

namespace icash\app;

DEFINE('DEBUG', true);

ini_set('display_errors', 1);
error_reporting(E_ALL);

spl_autoload_extensions('.php');
spl_autoload_register();

$App = new App();
