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
                $_SESSION['error'] = "Thông tin đăng nhập không hợp lệ";
                header('Location: ' . BASE_URL . '?action=login');
                exit();
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

    /**
     * Hiển thị trang hồ sơ cá nhân
     */
    public function profile()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . '?action=login');
            exit();
        }

        require_once PATH_VIEW_CLIENT . 'auth/profile.php';
    }

    /**
     * Xử lý cập nhật thông tin cá nhân hoặc mật khẩu
     */
    public function updateProfile()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . '?action=login');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userID = $_SESSION['user']['user_id'];
            $formType = $_POST['form_type'] ?? '';

            try {
                if ($formType === 'info') {
                    // Cập nhật thông tin cá nhân
                    $data = [
                        'full_name'    => $_POST['full_name'] ?? $_SESSION['user']['full_name'],
                        'phone_number' => $_POST['phone_number'] ?? $_SESSION['user']['phone_number'],
                        'address'      => $_POST['address'] ?? ($_SESSION['user']['address'] ?? null),
                    ];

                    $this->user->update($data, 'user_id = :id', ['id' => $userID]);

                    // Cập nhật lại session
                    $_SESSION['user']['full_name'] = $data['full_name'];
                    $_SESSION['user']['phone_number'] = $data['phone_number'];
                    $_SESSION['user']['address'] = $data['address'];

                    $_SESSION['success'] = 'Cập nhật thông tin thành công!';

                } elseif ($formType === 'password') {
                    // Cập nhật mật khẩu
                    $currentPassword = $_POST['current_password'];
                    $newPassword = $_POST['new_password'];
                    $confirmPassword = $_POST['confirm_password'];

                    // 1. Kiểm tra mật khẩu mới và xác nhận mật khẩu
                    if (empty($newPassword) || $newPassword !== $confirmPassword) {
                        throw new Exception('Mật khẩu mới không khớp hoặc để trống.');
                    }

                    // 2. Kiểm tra mật khẩu hiện tại có đúng không
                    $currentUser = $this->user->find('*', 'user_id = :id', ['id' => $userID]);
                    if (!password_verify($currentPassword, $currentUser['password_hash'])) {
                        throw new Exception('Mật khẩu hiện tại không đúng.');
                    }

                    // 3. Cập nhật mật khẩu mới
                    $data = [
                        'password_hash' => password_hash($newPassword, PASSWORD_DEFAULT)
                    ];
                    $this->user->update($data, 'user_id = :id', ['id' => $userID]);

                    $_SESSION['success'] = 'Đổi mật khẩu thành công!';
                }
            } catch (\Throwable $th) {
                $_SESSION['error'] = 'Lỗi: ' . $th->getMessage();
            }
        }

        header('Location: ' . BASE_URL . '?action=profile');
        exit();
    }
}