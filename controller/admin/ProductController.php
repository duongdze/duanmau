<?php
class ProductController{
    private $product;
    public function __construct(){
        $this->product = new Product();
    }

    public function index()
    {
        $title = 'Danh sách Sản phẩm';
        // Sử dụng phương thức mới để lấy dữ liệu có cả tên danh mục
        $data = $this->product->selectAllWithCategoryName();
        
        // Đặt tên view và gọi layout chính để hiển thị
        $view = 'products/product';
        require_once PATH_VIEW_ADMIN . 'products/index.php';
    }
    public function show()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: ' . BASE_URL_ADMIN . '&action=products');
            exit();
        }

        $data = $this->product->find('*', 'product_id = :id', ['id' => $id]);
        
        if (!$data) {
            // Optionally set a session flash message for "not found"
            header('Location: ' . BASE_URL_ADMIN . '&action=products');
            exit();
        }

        $title = 'Chi tiết sản phẩm: ' . htmlspecialchars($data['product_name']);
        require_once PATH_VIEW_ADMIN . 'products/show.php';
    }
}