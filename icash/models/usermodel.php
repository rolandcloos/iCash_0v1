<?php

namespace icash\models;
use icash\app\db;

class UserModel extends Model
{
    private $userlogin;
    function __construct() {
        parent::__construct();
    }
    
    public function checkLogin($postdata) {
        $db = new DB();
        extract($postdata);
        $query = "SELECT * FROM user WHERE email = :email AND pass = :password;";
        $sql = $db->query( $query );
        $sql->param( ":email", $email );
        $sql->param( ":password", $password );
        return $sql->result();
    }

}