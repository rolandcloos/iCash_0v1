<?php

namespace controllers;

class ProductController Extends Controller
{
    public function show($id = null)
    {

        $model = new  \models\ProductModel();
        
        if ($id == null)
        {
            
            $view = new \views\ProductView();
            $result = $model->getAll();
            $view->assign($result);
            $view->showList();
            
        }
        else{
            
            $view = new \views\ProductView();
            $view->assign($model->getOne($id));
            $view->showDetail();
    
        }
    }
    

}

