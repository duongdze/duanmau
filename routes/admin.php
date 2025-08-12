<?php
$action = $_GET['action'] ?? '/';

match ($action){
    '/'                     => (new DashboardController)->index(),
    
    //login logout in user
    'login'                 => (new UserController)->login(),
    'loginProcess'          => (new UserController)->loginProcess(),
    'logout'                => (new UserController)->logout(),

    //CRUD User
    
    'users'                 => (new UserController)->index(),
    'users-show'            => (new UserController)->show(),
    'users-create'          => (new UserController)->create(),
    'users-store'           => (new UserController)->store(),
    'users-edit'            => (new UserController)->edit(),
    'users-update'          => (new UserController)->update(),
    'users-delete'          => (new UserController)->delete(),

    
    //CRUD product
    'products'              => (new ProductController)->index(),
    'products-show'         => (new ProductController)->show(),
    'products-create'         => (new ProductController)->create(),
    'products-store'         => (new ProductController)->store(),
    'products-edit'         => (new ProductController)->edit(),
    'products-update'         => (new ProductController)->update(),
    'products-delete'         => (new ProductController)->delete(),


    //CRUD category
    'categories'            => (new CategoryController)->index(),
    'categories-show'       => (new CategoryController)->show(),
    'categories-create'     => (new CategoryController)->create(),
    'categories-store'      => (new CategoryController)->store(),
    'categories-edit'       => (new CategoryController)->edit(),
    'categories-update'     => (new CategoryController)->update(),
    'categories-delete'     => (new CategoryController)->delete(),
    


    

};