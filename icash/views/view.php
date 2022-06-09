<?php

namespace icash\views;

class View {

    protected $vars;

    public function __construct()
    {

        include("templates/header.php");
    }

    public function __destruct()
    {
        include("templates/footer.php");
    }
    

    public function assign($vars) { 
        if (@count($vars) == @count($vars, COUNT_RECURSIVE)) 
        {   
            $this->vars = $vars;
        } else {
            foreach($vars as $key => $value)
            {
                foreach($value as $k => $v)
                {
                    $this->vars[$k][] = $v;
                }
            }
        }
    }

    public function show() {

        echo "SHOW Method from VIEW Class<br>";
        extract($this->vars);
        $title = "iCash | ProductList";
        
    }


}