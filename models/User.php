<?php
class User extends BaseModel{
    protected $table = 'users';
    public function checkLogin($e, $p ){
        
        $sql = "SELECT * FROM users WHERE users.email = '$e' AND password_hash = '$p' AND user_type = 'admin' ";
        var_dump($sql);

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
}