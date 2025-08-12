<?php

class HomeController
{
    public function index() 
    {
        $productModel = new Product();
        $topSellingProducts = $productModel->getTopSellingProducts(3);

        require_once PATH_VIEW_CLIENT . 'pages/home.php';
    }
    
}