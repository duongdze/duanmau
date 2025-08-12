<?php
$action = $_GET['action'] ?? '/';

match ($action){
    '/'     => (new HomeController)->index(),
    
    //auth
    'login' => (new AuthController)->login(),
    'logout' => (new AuthController)->logout(),
    'register' => (new AuthController)->register(),
    
    //pages
    'contact' => (new PagesController)->contact(),
    'bestsell' => (new PagesController)->bestsell(),
    'cart' => (new PagesController)->cart(),
    'payment' => (new PagesController)->payment(),
    'news' => (new PagesController)->news(),
    'newsdetail' => (new PagesController)->newsdetail(),
    'productdetail' => (new PagesController)->productdetail(),
    
};