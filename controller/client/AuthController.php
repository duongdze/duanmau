<?php
class AuthController{
    private $user;
    public function __construct()
    {
        $this->user = new User();
    }
    public function login(){
        require_once PATH_VIEW_CLIENT . 'auth/login.php';
    }
    public function handleLogin(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = $this->user->checkCustomer($email, $password);

            if ($user) {
                $_SESSION['user'] = $user;
                header('Location: ' . BASE_URL); 
                exit;
            } else {
                $error = "Thông tin đăng nhập không hợp lệ";
                require_once PATH_VIEW_CLIENT . 'auth/login.php';
            }
        }
    }


    public function logout(){
        // Hủy session của người dùng
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        // Chuyển hướng về trang chủ
        header('Location: ' . BASE_URL);
        exit();
    }
    public function register(){
        require_once PATH_VIEW_CLIENT . 'auth/register.php';
    }
    
    public function handleRegister()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = new User();

            try {
                $data = [
                    'full_name'  => $_POST['fullName'] ?? null,
                    'email'      => $_POST['email'] ?? null,
                    'username'   => $_POST['username'] ?? null,
                    'user_type'  => 'customer', // Mặc định là customer cho người dùng đăng ký
                ];

                // Validate password
                $password = $_POST['password'] ?? null;
                $confirmPassword = $_POST['confirmPassword'] ?? null;
                if (empty($password) || $password !== $confirmPassword) {
                    throw new Exception('Mật khẩu không khớp hoặc để trống!');
                }
                $data['password_hash'] = password_hash($password, PASSWORD_DEFAULT);

                $userModel->insert($data);

                $_SESSION['success'] = 'Đăng ký thành công! Vui lòng đăng nhập.';
                header('Location: ' . BASE_URL . '?action=login');
                exit();
            } catch (\Throwable $th) {
                $_SESSION['error'] = 'Lỗi: ' . $th->getMessage();
                header('Location: ' . BASE_URL . '?action=register');
                exit();
            }
        }
    }
}