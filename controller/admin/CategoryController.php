<?php
class CategoryController{
    private $category;
    public function __construct()
    {
        $this->category = new Category();
    }
    public function index(){
        $title = 'Danh sách Danh mục';
        $data = $this->category->select('*', '1 = 1 ORDER BY category_id ASC');

        require_once PATH_VIEW_ADMIN . 'categories/index.php';
    }

    public function show() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: ' . BASE_URL_ADMIN . '&action=categories');
            exit();
        }

        $data = $this->category->find('*', 'category_id = :id', ['id' => $id]);
        $title = 'Chi tiết danh mục: ' . htmlspecialchars($data['category_name']);
        require_once PATH_VIEW_ADMIN . 'categories/show.php';
    }

    public function create()
    {
        $title = 'Thêm mới Danh mục';
        require_once PATH_VIEW_ADMIN . 'categories/create.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $data = [
                    'category_name' => $_POST['category_name'] ?? null,
                    'description'   => $_POST['description'] ?? null,
                ];

                if (empty($data['category_name'])) {
                    throw new Exception('Tên danh mục là bắt buộc!');
                }

                $this->category->insert($data);

                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Thêm mới danh mục thành công!';
            } catch (\Throwable $th) {
                $_SESSION['success'] = false;
                $_SESSION['msg'] = 'Lỗi: ' . $th->getMessage();
            }

            header('Location: ' . BASE_URL_ADMIN . '&action=categories');
            exit();
        }
    }

    public function edit()
    {
        try {
            $id = $_GET['id'] ?? null;
            if (!$id) throw new Exception('Thiếu tham số ID!');

            $category = $this->category->find('*', 'category_id = :id', ['id' => $id]);
            if (empty($category)) throw new Exception("Danh mục với ID $id không tồn tại!");

            $title = 'Cập nhật danh mục: ' . htmlspecialchars($category['category_name']);
            require_once PATH_VIEW_ADMIN . 'categories/edit.php';
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = 'Lỗi: ' . $th->getMessage();
            header('Location: ' . BASE_URL_ADMIN . '&action=categories');
            exit();
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['category_id'] ?? null;
            if (!$id) {
                header('Location: ' . BASE_URL_ADMIN . '&action=categories');
                exit();
            }

            try {
                $data = [
                    'category_name' => $_POST['category_name'] ?? null,
                    'description'   => $_POST['description'] ?? null,
                ];

                if (empty($data['category_name'])) {
                    throw new Exception('Tên danh mục là bắt buộc!');
                }

                $this->category->update($data, 'category_id = :id', ['id' => $id]);

                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Cập nhật danh mục thành công!';
            } catch (\Throwable $th) {
                $_SESSION['success'] = false;
                $_SESSION['msg'] = 'Lỗi: ' . $th->getMessage();
            }

            header('Location: ' . BASE_URL_ADMIN . '&action=categories');
            exit();
        }
    }

    public function delete()
    {
        try {
            $id = $_GET['id'] ?? null;
            if (!$id) throw new Exception('Thiếu tham số ID!');

            $this->category->delete('category_id = :id', ['id' => $id]);

            $_SESSION['success'] = true;
            $_SESSION['msg'] = 'Xóa danh mục thành công!';
        } catch (\PDOException $e) {
            $_SESSION['success'] = false;
            // Bắt lỗi ràng buộc khóa ngoại
            if ($e->getCode() == '23000') {
                $_SESSION['msg'] = 'Không thể xóa danh mục này vì vẫn còn sản phẩm thuộc về nó.';
            } else {
                $_SESSION['msg'] = 'Lỗi: ' . $e->getMessage();
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = 'Lỗi: ' . $th->getMessage();
        }
        header('Location: ' . BASE_URL_ADMIN . '&action=categories');
        exit();
    }
}