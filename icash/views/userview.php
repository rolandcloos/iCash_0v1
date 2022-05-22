<?php

namespace icash\views;

class UserView extends View{

    public function __construct() {
        parent::__construct();
    }

    public function login() {
        $title = "iCash | Login";
        include("templates/user_login.php");
        die();
    }

}