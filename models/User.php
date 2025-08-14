<?php
class User extends BaseModel{
    protected $table = 'users';
    public function checkLogin($email, $password ){
        
        $sql = "SELECT * FROM users WHERE users.email = '$email' AND password_hash = '$password' AND user_type = 'admin' ";
        

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function checkCustomer($Email, $Password) {
    // Truy vấn chỉ lấy user theo email
    $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':email', $Email, PDO::PARAM_STR);
    $stmt->execute();
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($Password, $user['password_hash'])) {
        // Mật khẩu đúng → trả về thông tin user
        return $user;
    }

    // Sai email hoặc mật khẩu → trả về false
    return false;
}
}