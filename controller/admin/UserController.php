<?php
class UserController
{
    private $user;
    public function __construct()
    {
        $this->user = new User();
    }
    public function index()
    {
        $title = 'Danh sách User';
        $data = $this->user->select('*', '1 = 1 ORDER BY user_id ASC');

        require_once PATH_VIEW_ADMIN . 'users/index.php';
    }
    public function show(){
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: ' . BASE_URL_ADMIN . '&action=users');
            exit();
        }

        $data = $this->user->find('*', 'user_id = :id', ['id' => $id]);
        // $title = 'Chi tiết user: ' . htmlspecialchars($data['user_name']);
        require_once PATH_VIEW_ADMIN . 'users/show.php';
    }
    public function delete()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception('Thiếu tham số "id"', 99);
            }

            $id = $_GET['id'];

            $user = $this->user->find('*', 'user_id = :id', ['id' => $id]);

            if (empty($user)) {
                throw new Exception("User có ID = $id KHÔNG TỒN TẠI!");
            }

            $rowCount = $this->user->delete('user_id = :id', ['id' => $id]);

            if ($rowCount > 0) {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Thao tác thành công!';
            } else {
                throw new Exception('Thao tác KHÔNG thành công!');
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }

        header('Location: ' . BASE_URL_ADMIN . '&action=users');
        exit();
    }
    public function create(){
        $view = 'users/create';
        $title = 'Thêm mới User';

        require_once PATH_VIEW_ADMIN . 'users/create.php';
    }
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $data = [
                    'username' => $_POST['username'] ?? null,
                    'email' => $_POST['email'] ?? null,
                    'full_name' => $_POST['full_name'] ?? null,
                    'phone_number' => $_POST['phone_number'] ?? null,
                    'user_type' => $_POST['user_type'] ?? 'customer',
                ];

                // Validate password
                $password = $_POST['password'] ?? null;
                $confirmPassword = $_POST['confirm_password'] ?? null;
                if (empty($password) || $password !== $confirmPassword) {
                    throw new Exception('Mật khẩu không khớp hoặc để trống!');
                }
                $data['password_hash'] = password_hash($password, PASSWORD_DEFAULT);

                $this->user->insert($data);

                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Thêm mới người dùng thành công!';
            } catch (\Throwable $th) {
                $_SESSION['success'] = false;
                $_SESSION['msg'] = 'Lỗi: ' . $th->getMessage();
            }

            header('Location: ' . BASE_URL_ADMIN . '&action=users');
            exit();
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_POST['user_id'] ?? null;
            if (!$userId) {
                header('Location: ' . BASE_URL_ADMIN . '&action=users');
                exit();
            }

            try {
                $user = $this->user->find('*', 'user_id = :id', ['id' => $userId]);
                if (!$user) throw new Exception("Không tìm thấy người dùng với ID: $userId");

                $data = [
                    'username' => $_POST['username'] ?? $user['username'],
                    'email' => $_POST['email'] ?? $user['email'],
                    'full_name' => $_POST['full_name'] ?? $user['full_name'],
                    'phone_number' => $_POST['phone_number'] ?? $user['phone_number'],
                    'user_type' => $_POST['user_type'] ?? $user['user_type'],
                ];

                // Update password only if a new one is provided
                $newPassword = $_POST['password'] ?? null;
                if (!empty($newPassword)) {
                    $data['password_hash'] = password_hash($newPassword, PASSWORD_DEFAULT);
                }

                $this->user->update($data, 'user_id = :id', ['id' => $userId]);

                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Cập nhật người dùng thành công!';
            } catch (\Throwable $th) {
                $_SESSION['success'] = false;
                $_SESSION['msg'] = 'Lỗi: ' . $th->getMessage();
            }

            header('Location: ' . BASE_URL_ADMIN . '&action=users');
            exit();
        }
    }
    public function edit(){
        try {
            if (!isset($_GET['id'])) {
                throw new Exception('Thiếu tham số "id"', 99);
            }

            $id = $_GET['id'];

            $user = $this->user->find('*', 'user_id = :id', ['id' => $id]);

            if (empty($user)) {
                throw new Exception("User có ID = $id KHÔNG TỒN TẠI!");
            }

            $view = 'users/edit';
            $title = "Cập nhật User có ID = $id";

            require_once PATH_VIEW_ADMIN . 'users/edit.php';
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL_ADMIN . '&action=users');
            exit();
        }
    }
    



    //login logout
    public function login()
    {
        require_once PATH_VIEW_ADMIN . 'auth/login.php';
    }
    public function loginProcess()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

             $user = $this->user->checkLogin($email, $password);

            if ($user) {
                $_SESSION['user'] = $user;
                header('Location: ' . BASE_URL_ADMIN); // Chuyển hướng về dashboard
                exit;
            } else {
                $error = "Thông tin đăng nhập không hợp lệ";
                require_once PATH_VIEW_ADMIN . 'auth/login.php';
            }
        }
    }
    public function logout()
    {
        // Hủy session một cách an toàn
        unset($_SESSION['user']);
        session_destroy();
        // Chuyển hướng thẳng về trang login
        header('location: ' . BASE_URL_ADMIN . '&action=login');
        exit;
    }
}
