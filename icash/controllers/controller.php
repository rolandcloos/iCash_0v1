<?php

namespace icash\controllers;

//echo "CONTROLLER.PHP: " . __file__ . " loaded ... <br>";

class Controller
{
    public function __construct()
    {
//echo "CONTROLLER.PHP: " . \get_class($this) .  " started... <br>";
        $this->user = new UserController();
    }

    public function index()
    {

        echo "<b>BASE - Controller -> INDEX</b> von " . \get_class($this) . PHP_EOL;
        $view = new \icash\views\View();
        $view->assign(array());
        $view->show();    

    }
}