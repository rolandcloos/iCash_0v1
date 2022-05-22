<?php

namespace icash\models;
use icash\app\DB;

class ProductModel extends Model
{
    
    function __construct() {
        parent::__construct();
    }
    
    public static function getAll() {
        $query [0]= "SELECT * FROM product;";
        $db = new DB();
        $sql = $db->query( $query );
        return $sql->result();
    }

    public static function getOne($id) {
        $query [0]= "SELECT * FROM product WHERE id=:id;";
        $db = new DB();
        $sql = $db->query( $query );
        $sql->param( ":id", $id );
        return $sql->result();
    }

}