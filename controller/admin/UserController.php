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
        $view = 'users/index';
        $title = 'Danh sach User';
        $data = $this->user->select('*', '1 = 1 ORDER BY user_id DESC');

        require_once PATH_VIEW_ADMIN_MAIN;
    }
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
                header("Location: " . BASE_URL_ADMIN . "&action=users-index");
                exit;
            } else {
                $error = "Thông tin đăng nhập không hợp lệ";
                require_once PATH_VIEW_ADMIN . 'login.php';
            }
        }
    }
}
