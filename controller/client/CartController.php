<?php

class CartController
{
    private $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    /**
     * Thêm sản phẩm vào giỏ hàng
     */
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productID = $_POST['product_id'] ?? null;
            $quantity = (int)($_POST['quantity'] ?? 1);

            if (!$productID || $quantity <= 0) {
                header('Location: ' . BASE_URL);
                exit();
            }

            $product = $this->product->find('*', 'product_id = :id', ['id' => $productID]);
            if (!$product) {
                die('Sản phẩm không tồn tại!');
            }

            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }

            if (isset($_SESSION['cart'][$productID])) {
                $_SESSION['cart'][$productID]['quantity'] += $quantity;
            } else {
                $_SESSION['cart'][$productID] = [
                    'product_id'   => $product['product_id'],
                    'product_name' => $product['product_name'],
                    'image_url'    => $product['image_url'],
                    'price'        => $product['price'],
                    'quantity'     => $quantity,
                ];
            }

            header('Location: ' . BASE_URL . '?action=cart');
            exit();
        }
    }

    /**
     * Hiển thị trang giỏ hàng
     */
    public function showCart()
    {
        $cartItems = $_SESSION['cart'] ?? [];
        $subTotal = array_reduce($cartItems, fn($sum, $item) => $sum + ($item['price'] * $item['quantity']), 0);
        $shippingFee = 30000; // Phí ship ví dụ
        $total = $subTotal + $shippingFee;

        require_once PATH_VIEW_CLIENT . 'pages/cart.php';
    }

    /**
     * Xóa sản phẩm khỏi giỏ hàng
     */
    public function remove()
    {
        $productID = $_GET['id'] ?? null;
        if ($productID) {
            if (isset($_SESSION['cart'][$productID])) {
                unset($_SESSION['cart'][$productID]);
            }
        }
        header('Location: ' . BASE_URL . '?action=cart');
        exit();
    }

    /**
     * Cập nhật toàn bộ giỏ hàng và chuyển đến trang thanh toán
     */
    public function updateAndCheckout()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['quantities']) && is_array($_POST['quantities'])) {
                foreach ($_POST['quantities'] as $productID => $quantity) {
                    $quantity = (int)$quantity;
                    if (isset($_SESSION['cart'][$productID])) {
                        if ($quantity > 0) {
                            $_SESSION['cart'][$productID]['quantity'] = $quantity;
                        } else {
                            unset($_SESSION['cart'][$productID]); // Xóa nếu số lượng <= 0
                        }
                    }
                }
            }
        }
        // Sau khi cập nhật, chuyển hướng đến trang thanh toán
        header('Location: ' . BASE_URL . '?action=payment');
        exit();
    }
}
