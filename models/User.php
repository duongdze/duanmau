<?php
class User extends BaseModel{
    protected $table = 'users';
    

    /**
     * Kiểm tra đăng nhập cho admin.
     * @param string $email
     * @param string $password
     * @return array|false
     */
    public function checkLogin($email, $password)
    {
        // Cảnh báo: Câu lệnh SQL gốc của bạn có lỗ hổng SQL Injection nghiêm trọng.
        // Phiên bản này đã được sửa lại để an toàn hơn.
        $sql = "SELECT * FROM users WHERE email = :email AND user_type = 'admin' LIMIT 1";
        $stmt = self::$pdo->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // So sánh mật khẩu đã hash với mật khẩu người dùng nhập
        if ($user && password_verify($password, $user['password_hash'])) {
            return $user;
        }
        return false;
    }

    public function checkCustomer($Email, $Password) {
        // Truy vấn chỉ lấy user theo email
        $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $stmt = self::$pdo->prepare($sql); // Sửa lỗi: truy cập thuộc tính static $pdo
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

