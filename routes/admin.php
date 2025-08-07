<?php
$action = $_GET['action'] ?? '/';

match ($action){
    '/' => (new DashboardController)->index(),
    
    //login logout in user
    'login'                 => (new UserController)->login(),
    'loginProcess'          => (new UserController)->loginProcess(),
    'logout'                => (new UserController)->logout(),

    //CRUD User
    
    'users'                 => (new UserController)->index(),
    'users-show'            => (new UserController)->show(),
    'users-create'          => (new UserController)->create(),
    'users-edit'            => (new UserController)->edit(),
    'users-delete'          => (new UserController)->delete(),

    
    //CRUD product
    'products'              => (new ProductController)->index(),
    'products-show'         => (new ProductController)->show(),


    //CRUD category
    'categories'            => (new CategoryController)->index(),
    'categories-show'       => (new CategoryController)->show(),
    


    

};