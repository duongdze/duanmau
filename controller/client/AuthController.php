<?php
class AuthController{
    public function login(){
        require_once PATH_VIEW_CLIENT . 'auth/login.php';
    }
    public function logout(){
        require_once PATH_VIEW_CLIENT . 'auth/login.php';
    }
    public function register(){
        require_once PATH_VIEW_CLIENT . 'auth/register.php';
    }
}