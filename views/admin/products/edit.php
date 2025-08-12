<?php include PATH_VIEW_ADMIN . '/default/header.php'; ?>

<div class="card">
    <div class="card-header">
        <h1 class="h5">Cập nhật sản phẩm</h1>
    </div>
    <div class="card-body">
        <form action="<?= BASE_URL_ADMIN ?>&action=products-update" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Tên sản phẩm:</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" value="<?= htmlspecialchars($product['product_name']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Danh mục:</label>
                        <select class="form-select" id="category_id" name="category_id" required>
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?= $category['category_id'] ?>" <?= ($product['category_id'] == $category['category_id']) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($category['category_name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Giá:</label>
                        <input type="number" class="form-control" id="price" name="price" step="1000" value="<?= $product['price'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="stock_quantity" class="form-label">Số lượng trong kho:</label>
                        <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" value="<?= $product['stock_quantity'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="image_url" class="form-label">Ảnh sản phẩm mới:</label>
                        <input type="file" class="form-control" id="image_url" name="image_url">
                        <small class="form-text text-muted">Để trống nếu không muốn thay đổi ảnh.</small>
                        <?php if (!empty($product['image_url'])) : ?>
                            <img src="<?= BASE_ASSETS_UPLOADS . $product['image_url'] ?>" alt="Ảnh hiện tại" class="img-thumbnail mt-2" width="100">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả:</label>
                        <textarea class="form-control" id="description" name="description" rows="3"><?= htmlspecialchars($product['description'] ?? 'Chưa cập nhật') ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="brand" class="form-label">Thương hiệu:</label>
                        <input type="text" class="form-control" id="brand" name="brand" value="<?= htmlspecialchars($product['brand']) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="color" class="form-label">Màu sắc:</label>
                        <input type="text" class="form-control" id="color" name="color" value="<?= htmlspecialchars($product['color']) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="size" class="form-label">Kích thước:</label>
                        <input type="text" class="form-control" id="size" name="size" value="<?= htmlspecialchars($product['size']) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Trạng thái:</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="available" <?= ($product['status'] == 'available') ? 'selected' : '' ?>>Available</option>
                            <option value="out_of_stock" <?= ($product['status'] == 'out_of_stock') ? 'selected' : '' ?>>Out of Stock</option>
                            <option value="inactive" <?= ($product['status'] == 'inactive') ? 'selected' : '' ?>>Inactive</option>
                        </select>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-warning">Cập nhật</button>
            <a href="<?= BASE_URL_ADMIN ?>&action=products" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</div>

<?php include PATH_VIEW_ADMIN . '/default/footer.php'; ?>
