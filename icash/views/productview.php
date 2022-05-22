<?php

namespace icash\views;

class ProductView extends View{

    public function __construct() {
        parent::__construct();
    }

    public function show() {
        extract($this->vars);
        $title = "iCash | ProductList";
        include("templates/product_show.php");
    }

    public function showList() {
        echo "<h2>ListView</h2>";
        $this->show();
    }

    public function showDetail() {
        echo "<h2>Product Details</h2>";
        $this->show();
    }
}