<?php

namespace icash\controllers;

//echo \get_class($this) . " loaded ... <br>";

class UserController
{
    public function __construct()
    {
        
        session_start();
        if(!@$_SESSION['user']) // Keine User Session, also LOGIN
        {
            $info[] = "Bitte loggen Sie sich ein.";
            $this->login($info);
        } else { // User Session vorhanden...
            if($_SESSION['user']['last_access'] < time() - APP_CONFIG['APP']['session_time']) // ... Session aber nicht mehr aktuell, also LOGIN
            {
                session_destroy();
                $info[0] = "Ihre Sitzung ist abgelaufen. Bitte neu einloggen.";
                $this->login($info);
            }
            else { // Last Access für User neu setzen
                $_SESSION['user']['last_access'] = time();
            }
        }
    }

    public function login($info)
    {
        if(!$_POST) { // wurde das Formular noch nicht abgeschickt, dann Login Form anzeigen
            $view = new \icash\views\UserView();
            $view->assign($info);
            $view -> login();
        } else { // Es wurde bereits das Formular abgeschickt
            $user = new \icash\models\UserModel();
            if($userdata = $user->checkLogin($_POST)) // Daten mit stimmen mit UserModel / DataBase überein
            {
                // Session setzen
                $_SESSION['user'] = array();
                $_SESSION['user']['firstname'] = $userdata['name'];
                $_SESSION['user']['last_access'] = time(); 
            }
            else{
                // Fehlerhaftes Login!!!
            }           
        }
    }

}