<?php
// Khởi tạo session nếu chưa có để quản lý giỏ hàng và đăng nhập
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$action = $_GET['action'] ?? '/';

match ($action){
    '/'     => (new HomeController)->index(),
    
    //auth
    'login' => (new AuthController)->login(),
    'handle-login' => (new AuthController)->handleLogin(),
    'logout' => (new AuthController)->logout(),
    'register' => (new AuthController)->register(),
    'handle-register' => (new AuthController)->handleRegister(),
    
    //pages
    'contact' => (new PagesController)->contact(),
    'bestsell' => (new PagesController)->bestsell(),

    // Cart
    'cart' => (new CartController)->showCart(),
    'cart-add' => (new CartController)->add(),
    'cart-remove' => (new CartController)->remove(),
    'cart-update-and-checkout' => (new CartController)->updateAndCheckout(),

    'payment' => (new PagesController)->payment(),
    'news' => (new PagesController)->news(),
    'newsdetail' => (new PagesController)->newsdetail(),
    'productdetail' => (new PagesController)->productdetail(),
    
};