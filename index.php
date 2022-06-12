<?php

use app\App;
use helpers\Logger;

    date_default_timezone_set('Europe/Berlin');

    DEFINE('DEBUG', true);

 
    set_error_handler(function($errno,$errstr, $errfile, $errline, $args) {
        Logger::error($errfile . " in Line " . $errline . ": (" . $errno . ") " . $errstr);
    });
    
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    //ini_set('open_basedir', 'none');

    spl_autoload_extensions('.php');
    spl_autoload_register();
    
    App::run();
    restore_error_handler();
