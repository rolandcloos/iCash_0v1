<?php

namespace icash\controllers;

class ProductController Extends Controller
{
    public function show($id = null)
    {

        $model = new  \icash\models\ProductModel();
        
        if ($id == null)
        {
            
            $view = new \icash\views\ProductView();
            $result = $model->getAll();
            $view->assign($result);
            $view->showList();
            
        }
        else{
            
            $view = new \icash\views\ProductView();
            $view->assign($model->getOne($id));
            $view->showDetail();
    
        }
    }
    

}

