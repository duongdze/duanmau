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
    'profile' => (new AuthController)->profile(),
    'profile-update' => (new AuthController)->updateProfile(),
    
    //pages
    'contact' => (new PagesController)->contact(),
    'bestsell' => (new PagesController)->bestsell(),
    'search' => (new PagesController)->search(),

    // Cart
    'cart' => (new CartController)->showCart(),
    'cart-add' => (new CartController)->add(),
    'cart-remove' => (new CartController)->remove(),
    'cart-update-and-checkout' => (new CartController)->updateAndCheckout(),

    'payment' => (new PagesController)->payment(),
    'place-order' => (new OrderController)->placeOrder(),
    'payment-success' => (new OrderController)->paymentSuccess(),
    'order-history' => (new OrderController)->orderHistory(),
    'order-detail' => (new OrderController)->orderDetail(),

    'news' => (new PagesController)->news(),
    'newsdetail' => (new PagesController)->newsdetail(),
    'productdetail' => (new PagesController)->productdetail(),
    
};