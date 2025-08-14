<?php
class PagesController{
    public function contact(){
        require_once PATH_VIEW_CLIENT . 'pages/contact.php';
    }
    public function bestsell(){
        // Khởi tạo model Product
        $productModel = new Product();
        // Lấy tất cả sản phẩm (bạn có thể thay thế bằng logic lấy sản phẩm bán chạy nếu muốn)
        $products = $productModel->selectAllWithCategoryName();

        require_once PATH_VIEW_CLIENT . 'pages/bestsell.php';
    }
    public function payment(){
        // Lấy thông tin giỏ hàng từ session để hiển thị trên trang thanh toán
        $cartItems = $_SESSION['cart'] ?? [];

        if (empty($cartItems)) {
            header('Location: ' . BASE_URL . '?action=cart');
            exit();
        }

        $subTotal = array_reduce($cartItems, fn($sum, $item) => $sum + ($item['price'] * $item['quantity']), 0);
        $shippingFee = 30000; // Phí ship ví dụ
        $total = $subTotal + $shippingFee;
        
        require_once PATH_VIEW_CLIENT . 'pages/payment.php';
    }
    public function news(){
        require_once PATH_VIEW_CLIENT . 'pages/news.php';
    }
    public function newsdetail(){
        require_once PATH_VIEW_CLIENT . 'pages/newsdetail.php';
    }
    public function productdetail(){
        // Lấy ID sản phẩm từ URL
        $productID = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        // Kiểm tra nếu ID không hợp lệ thì có thể chuyển hướng hoặc báo lỗi
        if ($productID <= 0) {
            // Tạm thời báo lỗi, trong thực tế nên có trang 404
            die('Sản phẩm không hợp lệ!');
        }

        // Gọi model để lấy thông tin sản phẩm
        $productModel = new Product();
        $product = $productModel->findWithCategoryName($productID);

        if (!$product) {
            die('Không tìm thấy sản phẩm!');
        }

        require_once PATH_VIEW_CLIENT . 'pages/productDetail.php';
    }
}