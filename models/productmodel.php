<?php

namespace models;
use app\DB;

class ProductModel extends Model
{
    
    function __construct() {
        parent::__construct();
    }
    
    public function getAll() {
        $db = new DB();
        $query = "SELECT * FROM product;";
        $sql = $db->query( $query );
        return $sql->results();
    }

    public function getOne($id) {
        $db = new DB();
        $query = "SELECT * FROM product WHERE id=:id;";
        $sql = $db->query( $query );
        $sql->param( ":id", $id );
        return $sql->results();

    }

}