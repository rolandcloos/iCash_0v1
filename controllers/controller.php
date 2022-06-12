<?php

namespace controllers;

use views\View; 

echo "CONTROLLER.PHP: " .\get_class($this)  . " loaded ... <br>";

class Controller
{
    public function __construct()
    {
echo "CONTROLLER.PHP: " . \get_class($this) .  " CONSTRUCT call... <br>";
        $this->user = new UserController();
        $this->view = new View();
        $this->params = [];
    }

    public function index()
    {
echo "CONTROLLER.PHP: " . \get_class($this) .  " INDEX call... <br>";

  
    }

    public function __destruct()
    {
        $this->view->assign($this->params);
        $this->view->show();
echo "CONTROLLER.PHP: " . \get_class($this) .  " DESTRUCT call... <br>";
    }
}