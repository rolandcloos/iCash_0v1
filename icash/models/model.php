<?php

namespace icash\models;

class Model
{

    protected $db;


    public function __construct() {

        $this->db = new \icash\app\DB();

    }



}