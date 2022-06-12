<?php

namespace app;
use helpers\Logger;

class App
{
    private $cPath;
    private $cClass;

    public function __construct()
    {
        $msg = 'APP::test';

        DEFINE("APP_CONFIG" , parse_ini_file("config.ini", true)); // True für die Überschriften ([DB]; [APP], usw.)
        $this->path = APP_CONFIG['APP']['PATH'] ;
        $this->cPath = $this->path . "/controllers/";
        $this->cClass = "\\" . $this->path . "controllers\\";
        
        $this->ViewTitles = APP_CONFIG['ViewTitles']['title'];
        foreach($this->ViewTitles as $tc => $val) {
            $this->SubTitles[$val] = APP_CONFIG['ViewTitles']['subtitle_' . $tc];
        }        
        extract($_REQUEST);
        $parts = explode("/", @$url);
        
        $ctrl = $parts[0] ?? 'home';



            $this->cClass = $this->cClass . $ctrl . "controller";
            
            if(!$this->cClass){
                $GLOBALS['error']['App'][] = "This controller doesnt exist. GO TO: home";
                $this->cClass = $this->cClass . "homecontroller";
            }
        

        $controller = new $this->cClass();

        $action = $parts[1] ?? null;
        $id = $parts[2] ?? null;

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

    public static function run() {
        return new static();
    }
}




?>