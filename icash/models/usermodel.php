<?php

namespace icash\models;

class UserModel extends Model
{
    private $userlogin;
    function __construct() {
        parent::__construct();
    }
    
    public function checkLogin($postdata) {
        extract($postdata);
        $query [0]= "SELECT * FROM user WHERE email = :email AND pass = :password;";
        $sql = $this->db->query( $query );
        $sql->param( ":email", $email );
        $sql->param( ":password", $password );
        return $sql->result();
    }

}