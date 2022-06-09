<?php

namespace iCash\app;


class App
{
    private $cPath;
    private $cClass;

    public function __construct()
    {
        DEFINE("APP_CONFIG" , parse_ini_file("config.ini", true)); // True für die Überschriften ([DB]; [APP], usw.)

        $this->cPath = APP_CONFIG['APP']['PATH'] . "/controllers/";
        $this->cClass = "\\" . APP_CONFIG['APP']['PATH'] . "\controllers\\";
        
        $this->ViewTitles = APP_CONFIG['ViewTitles']['title'];
        foreach($this->ViewTitles as $tc => $val) {
            $this->SubTitles[$val] = APP_CONFIG['ViewTitles']['subtitle_' . $tc];
        }
        
        extract($_REQUEST);
        $parts = explode("/", @$url);
        
        $ctrl = $parts[0] ?? 'home';


            if(file_exists($this->cPath . $ctrl . "controller.php"))
            {
                $this->cClass = $this->cClass . $ctrl . "controller";
            }
            else{
                $GLOBALS['error']['App'][] = "This controller doesnt exist. GO TO: home";
                $this->cClass = $this->cClass . "homecontroller";
            }
        

        $controller = new $this->cClass();

        $action = $parts[1] ?? null;
        $id = $parts[2] ?? null;

//echo $ctrl . " -> " . $action . " => " . $id;

        if(method_exists($controller, $action))
        {
           
            echo $controller->$action($id);
            
        }
        else{
            $GLOBALS['error']['App'][] = "This Action doesnt exist in Controller '" . get_class($controller) . "'. GO TO: " . get_class($controller) . " -> index";
            $action = 'index';
            echo $controller->$action();
        }

    }
}




?>