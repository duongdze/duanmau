<?php
class PagesController{
    public function contact(){
        require_once PATH_VIEW_CLIENT . 'pages/contact.php';
    }
    public function bestsell(){
        require_once PATH_VIEW_CLIENT . 'pages/bestsell.php';
    }
    public function cart(){
        require_once PATH_VIEW_CLIENT . 'pages/cart.php';
    }
    public function payment(){
        require_once PATH_VIEW_CLIENT . 'pages/payment.php';
    }
    public function news(){
        require_once PATH_VIEW_CLIENT . 'pages/news.php';
    }
    public function newsdetail(){
        require_once PATH_VIEW_CLIENT . 'pages/newsdetail.php';
    }
}