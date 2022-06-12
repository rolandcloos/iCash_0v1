<?php

namespace views;

class UserView extends View{

    public function __construct() {
        parent::__construct();
    }

    public function __destruct() {
        parent::__destruct();
    }

    public function login() {
        extract($this->vars);
        $title = "iCash | Login";
        include("templates/user_login.php");
        die();
    }
}