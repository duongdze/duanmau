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
        $data = $this->user->select('*', '1 = 1 ORDER BY user_id DESC');

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

                if (!empty($user['avatar']) && file_exists(PATH_ASSETS_UPLOADS . $user['avatar'])) {
                    unlink(PATH_ASSETS_UPLOADS . $user['avatar']);
                }

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
    public function edit(){
        try {
            if (!isset($_GET['id'])) {
                throw new Exception('Thiếu tham số "id"', 99);
            }

            $id = $_GET['id'];

            $user = $this->user->find('*', 'id = :id', ['id' => $id]);

            if (empty($user)) {
                throw new Exception("User có ID = $id KHÔNG TỒN TẠI!");
            }

            $view = 'users/edit';
            $title = "Cập nhật User có ID = $id";

            require_once PATH_VIEW_ADMIN . 'users/edit.php';
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL_ADMIN . '&action=users-index');
            exit();
        }
    }



    //login logout
    public function login()
    {
        require_once PATH_VIEW_ADMIN . 'login.php';
    }
    public function loginProcess()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"] ?? "";
            $password = $_POST["password"] ?? "";

            if ($username === "edu" && $password === "learn2023") {
                $_SESSION["username"] = $username;
                header("Location: " . BASE_URL_ADMIN); // Chuyển hướng về dashboard
                exit;
            } else {
                $error = "Thông tin đăng nhập không hợp lệ";
                require_once PATH_VIEW_ADMIN . 'login.php';
            }
        }
    }
    public function logout()
    {
        // Hủy session một cách an toàn
        unset($_SESSION['username']);
        session_destroy();
        // Chuyển hướng thẳng về trang login
        header("location: " . BASE_URL_ADMIN . '&action=login');
        exit;
    }
}
