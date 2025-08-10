<?php
$action = $_GET['action'] ?? '/';

match ($action){
    '/'     => (new HomeController)->index(),
    
    //auth
    'login' => (new AuthController)->login(),
    'logout' => (new AuthController)->logout(),
    'register' => (new AuthController)->register(),
};