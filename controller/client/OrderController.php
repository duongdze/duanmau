<?php

class OrderController
{
    private $orderModel;
    private $orderItemModel;

    public function __construct()
    {
        // Khởi tạo các model cần thiết
        $this->orderModel = new Order();
        $this->orderItemModel = new OrderItem();
    }

    /**
     * Kiểm tra xem người dùng đã đăng nhập chưa
     */
    private function checkAuth($message = 'Bạn cần đăng nhập để sử dụng chức năng này!')
    {
        if (!isset($_SESSION['user'])) {
            $_SESSION['error'] = $message;
            header('Location: ' . BASE_URL . '?action=login');
            exit();
        }
    }

    /**
     * Xử lý việc đặt hàng
     */
    public function placeOrder()
    {
        $this->checkAuth('Bạn cần đăng nhập để đặt hàng!');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . '?action=payment');
            exit();
        }

        $cartItems = $_SESSION['user']['cart'] ?? [];
        if (empty($cartItems)) {
            header('Location: ' . BASE_URL . '?action=cart');
            exit();
        }

        try {
            // Bắt đầu một transaction để đảm bảo toàn vẹn dữ liệu
            $this->orderModel->beginTransaction();

            // 1. Tính toán lại tổng tiền ở phía server để đảm bảo an toàn
            $subTotal = array_reduce($cartItems, fn($sum, $item) => $sum + ($item['price'] * $item['quantity']), 0);
            $shippingFee = 30000; // Phí ship cố định
            $totalAmount = $subTotal + $shippingFee;

            // 2. Tạo đơn hàng trong bảng `orders`
            $orderData = [
                'user_id'          => $_SESSION['user']['user_id'],
                'total_amount'     => $totalAmount,
                'status'           => 'pending', // Trạng thái mặc định
                'shipping_address' => $_POST['shipping_address'] ?? '',
                'payment_method'   => $_POST['payment_method'] ?? 'cod',
                'payment_status'   => 'pending', // Trạng thái thanh toán mặc định
                'notes'            => $_POST['notes'] ?? '',
            ];
            var_dump($orderData);

            $lastOrderID = $this->orderModel->insert($orderData);

            // 3. Thêm các sản phẩm từ giỏ hàng vào bảng `order_items`
            foreach ($cartItems as $productID => $item) {
                $orderItemData = [
                    'order_id'       => $lastOrderID,
                    'product_id'     => $productID,
                    'quantity'       => $item['quantity'],
                    'price_at_order' => $item['price'],
                ];
                $this->orderItemModel->insert($orderItemData);
            }

            // 4. Nếu mọi thứ thành công, commit transaction
            $this->orderModel->commit();

            // 5. Xóa giỏ hàng khỏi session
            unset($_SESSION['user']['cart']);

            // 6. Chuyển hướng đến trang đặt hàng thành công
            header('Location: ' . BASE_URL . '?action=payment-success');
            exit();

        } catch (\Throwable $th) {
            // Nếu có lỗi, rollback transaction
            $this->orderModel->rollBack();

            // Ghi log lỗi và chuyển hướng về trang thanh toán với thông báo lỗi
            error_log("Order placement failed: " . $th->getMessage());
            $_SESSION['error'] = 'Đã có lỗi xảy ra trong quá trình đặt hàng. Vui lòng thử lại.';
            header('Location: ' . BASE_URL . '?action=payment');
            exit();
        }
    }
    

    /**
     * Hiển thị trang đặt hàng thành công
     */
    public function paymentSuccess()
    {
        require_once PATH_VIEW_CLIENT . 'pages/payment-success.php';
    }

    public function orderHistory()
    {
        $this->checkAuth('Bạn cần đăng nhập để xem lịch sử đơn hàng!');
        
        $userID = $_SESSION['user']['user_id'];
        $orders = $this->orderModel->findByUserID($userID);

        require_once PATH_VIEW_CLIENT . 'pages/order-history.php';
    }

    /**
     * Hiển thị chi tiết một đơn hàng (sẽ được xây dựng sau)
     */
    public function orderDetail()
    {
        $this->checkAuth();
        $orderID = $_GET['id'] ?? null;
        if (!$orderID) {
            header('Location: ' . BASE_URL . '?action=order-history');
            exit();
        }
        // Logic để lấy chi tiết đơn hàng sẽ được thêm ở đây
        echo "Đây là trang chi tiết đơn hàng cho ID: " . htmlspecialchars($orderID) . ". Sẽ được xây dựng sau.";
    }
}