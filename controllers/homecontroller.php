<?php

namespace controllers;

class HomeController Extends Controller
{
    public function index()
    {
       
        $result = "<h1>Home</h1>Welcome home...";
        
        return $result;
    }
}