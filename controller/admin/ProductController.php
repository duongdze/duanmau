<?php
class ProductController
{
    private $product;
    public function __construct()
    {
        $this->product = new Product();
    }

    public function index()
    {
        $title = 'Danh sách Sản phẩm';
        // Sử dụng phương thức mới để lấy dữ liệu có cả tên danh mục
        $data = $this->product->selectAllWithCategoryName();

        // Đặt tên view và gọi layout chính để hiển thị
        require_once PATH_VIEW_ADMIN . 'products/index.php';
    }
    public function show()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: ' . BASE_URL_ADMIN . '&action=products');
            exit();
        }

        $data = $this->product->findWithCategoryName($id);

        if (!$data) {
            // Optionally set a session flash message for "not found"
            header('Location: ' . BASE_URL_ADMIN . '&action=products');
            exit();
        }

        $title = 'Chi tiết sản phẩm: ' . htmlspecialchars($data['product_name']);
        require_once PATH_VIEW_ADMIN . 'products/show.php';
    }
    public function delete()
    {
        try {
            $id = $_GET['id'] ?? null;
            if (!$id) throw new Exception('Thiếu tham số ID!');

            $product = $this->product->find('*', 'product_id = :id', ['id' => $id]);
            if (empty($product)) throw new Exception("Sản phẩm với ID $id không tồn tại!");

            $this->product->delete('product_id = :id', ['id' => $id]);

            if (!empty($product['image_url']) && file_exists(PATH_ASSETS_UPLOADS . $product['image_url'])) {
                unlink(PATH_ASSETS_UPLOADS . $product['image_url']);
            }

            $_SESSION['success'] = true;
            $_SESSION['msg'] = 'Xóa sản phẩm thành công!';
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = 'Lỗi: ' . $th->getMessage();
        }
        header('Location: ' . BASE_URL_ADMIN . '&action=products');
        exit();
    }
    public function create()
    {
        // Lấy danh sách danh mục để hiển thị trong dropdown
        $categoryModel = new Category();
        $categories = $categoryModel->select('*');

        $title = 'Thêm mới Sản phẩm';
        $view = 'products/create';

        require_once PATH_VIEW_ADMIN . 'products/create.php';
    }
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $data = [
                    'product_name'   => $_POST['product_name'] ?? null,
                    'category_id'    => $_POST['category_id'] ?? null,
                    'price'          => $_POST['price'] ?? null,
                    'stock_quantity' => $_POST['stock_quantity'] ?? null,
                    'description'    => $_POST['description'] ?? null,
                    'brand'          => $_POST['brand'] ?? null,
                    'color'          => $_POST['color'] ?? null,
                    'size'           => $_POST['size'] ?? null,
                    'status'         => $_POST['status'] ?? 'available',
                ];

                // Xử lý tải lên tệp ảnh
                $imageFile = $_FILES['image_url'] ?? null;

                if ($imageFile && $imageFile['error'] === UPLOAD_ERR_OK) {
                    $targetDir = PATH_ASSETS_UPLOADS . 'imgProducts/';
                    $fileName = time() . '_' . basename($imageFile['name']);
                    $targetFile = $targetDir . $fileName;
                    $uploadDir = realpath(__DIR__ . "/../../assets/uploads/imgProducts/");
                    $destination = $uploadDir . DIRECTORY_SEPARATOR . $fileName;
                    
                    if (move_uploaded_file($imageFile['tmp_name'], $destination)) {
                        $data['image_url'] = 'imgProducts/' . $fileName;
                    }
                }

                $this->product->insert($data);

                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Thêm mới sản phẩm thành công!';
            } catch (\Throwable $th) {
                $_SESSION['success'] = false;
                $_SESSION['msg'] = 'Lỗi: ' . $th->getMessage();
            }

            header('Location: ' . BASE_URL_ADMIN . '&action=products');
            exit();
        }
    }
    public function edit()
    {
        try {
            $id = $_GET['id'] ?? null;
            if (!$id) throw new Exception('Thiếu tham số ID!');

            $product = $this->product->find('*', 'product_id = :id', ['id' => $id]);
            if (empty($product)) throw new Exception("Sản phẩm với ID $id không tồn tại!");

            $categoryModel = new Category();
            $categories = $categoryModel->select('*');

            $title = 'Cập nhật sản phẩm: ' . htmlspecialchars($product['product_name']);
            require_once PATH_VIEW_ADMIN . 'products/edit.php';
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = 'Lỗi: ' . $th->getMessage();
            header('Location: ' . BASE_URL_ADMIN . '&action=products');
            exit();
        }
    }
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['product_id'] ?? null;
            if (!$id) {
                header('Location: ' . BASE_URL_ADMIN . '&action=products');
                exit();
            }

            try {
                $product = $this->product->find('*', 'product_id = :id', ['id' => $id]);
                if (!$product) throw new Exception("Không tìm thấy sản phẩm với ID: $id");

                $data = [
                    'product_name'   => $_POST['product_name'] ?? $product['product_name'],
                    'category_id'    => $_POST['category_id'] ?? $product['category_id'],
                    'price'          => $_POST['price'] ?? $product['price'],
                    'stock_quantity' => $_POST['stock_quantity'] ?? $product['stock_quantity'],
                    'description'    => $_POST['description'] ?? $product['description'],
                    'brand'          => $_POST['brand'] ?? $product['brand'],
                    'color'          => $_POST['color'] ?? $product['color'],
                    'size'           => $_POST['size'] ?? $product['size'],
                    'status'         => $_POST['status'] ?? $product['status'],
                ];

                $imageFile = $_FILES['image_url'] ?? null;
                if ($imageFile && $imageFile['error'] === UPLOAD_ERR_OK) {
                    $targetDir = PATH_ASSETS_UPLOADS . 'imgProducts/';
                    $fileName = time() . '_' . basename($imageFile['name']);
                    $targetFile = $targetDir . $fileName;
                    $uploadDir = realpath(__DIR__ . "/../../assets/uploads/imgProducts/");
                    $destination = $uploadDir . DIRECTORY_SEPARATOR . $fileName;

                    if (move_uploaded_file($imageFile['tmp_name'], $destination)) {
                        $data['image_url'] = 'imgProducts/' . $fileName;
                        if (!empty($product['image_url']) && file_exists(PATH_ASSETS_UPLOADS . $product['image_url'])) {
                            unlink(PATH_ASSETS_UPLOADS . $product['image_url']);
                        }
                    }
                }

                $this->product->update($data, 'product_id = :id', ['id' => $id]);

                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Cập nhật sản phẩm thành công!';
            } catch (\Throwable $th) {
                $_SESSION['success'] = false;
                $_SESSION['msg'] = 'Lỗi: ' . $th->getMessage();
            }

            header('Location: ' . BASE_URL_ADMIN . '&action=products');
            exit();
        }
    }
}
