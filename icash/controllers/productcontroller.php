<?php

namespace icash\controllers;
use \icash\models\ProductModel;

class ProductController Extends Controller
{
    public function show($id = null)
    {

  //      $model = new  ;
        
        if ($id == null)
        { 
            $view = new \icash\views\ProductView();
            $result = ProductModel::getAll();
            $view->assign($result);
            $view->showList();  
        }
        else{  
            $view = new \icash\views\ProductView();
            $result = ProductModel::getOne($id);
            $view->assign($result);
            $view->showDetail();
        }
       var_dump( print_r($this->user,1) );
    }
    

}

