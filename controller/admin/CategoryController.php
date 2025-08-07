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
}