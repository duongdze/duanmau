<?php include PATH_VIEW_ADMIN . '/default/header.php'; ?>

<div class="card">
    <div class="card-header">
        <h1 class="h5">Thêm mới sản phẩm</h1>
    </div>
    <div class="card-body">
        <form action="<?= BASE_URL_ADMIN ?>&action=products-store" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Tên sản phẩm:</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Danh mục:</label>
                        <select class="form-select" id="category_id" name="category_id" required>
                            <option value="" disabled selected>-- Chọn danh mục --</option>
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?= $category['category_id'] ?>"><?= htmlspecialchars($category['category_name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Giá:</label>
                        <input type="number" class="form-control" id="price" name="price" step="1000" required>
                    </div>
                    <div class="mb-3">
                        <label for="stock_quantity" class="form-label">Số lượng trong kho:</label>
                        <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" required>
                    </div>
                    <div class="mb-3">
                        <label for="image_url" class="form-label">Ảnh sản phẩm:</label>
                        <input type="file" class="form-control" id="image_url" name="image_url">
                    </div>
                     <div class="mb-3">
                        <label for="description" class="form-label">Mô tả:</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="brand" class="form-label">Thương hiệu:</label>
                        <input type="text" class="form-control" id="brand" name="brand">
                    </div>
                    <div class="mb-3">
                        <label for="color" class="form-label">Màu sắc:</label>
                        <input type="text" class="form-control" id="color" name="color">
                    </div>
                    <div class="mb-3">
                        <label for="size" class="form-label">Kích thước:</label>
                        <input type="text" class="form-control" id="size" name="size">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Trạng thái:</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="available" selected>Available</option>
                            <option value="out_of_stock">Out of Stock</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Thêm mới</button>
            <a href="<?= BASE_URL_ADMIN ?>&action=products" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</div>

<?php include PATH_VIEW_ADMIN . '/default/footer.php'; ?>
