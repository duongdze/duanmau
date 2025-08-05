<?php
$action = $_GET['action'] ?? '/';

match ($action){
    '/' => (new DashboardController)->index(),

    //CRUD User
    
    'users-index' => (new UserController)->index(),
    'login' => (new UserController)->login(),
    'loginProcess' => (new UserController)->loginProcess(),
    


    

};