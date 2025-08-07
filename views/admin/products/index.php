<?php include PATH_VIEW_ADMIN. '/default/header.php'; ?>

<a href="<?= BASE_URL_ADMIN ?>&action=products-create" class="btn btn-primary mb-3">Thêm mới sản phẩm</a>

<table class="table table-striped table-hover border">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Danh mục sản phẩm</th>
            <th>Ảnh</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $product) : ?>
            <tr>
                <td><?= $product['product_id'] ?></td>
                <td><?= htmlspecialchars($product['product_name']) ?></td>
                <td><?= htmlspecialchars($product['category_name']) ?></td>
                <td>
                    <?php if (!empty($product['image_url'])) : ?>
                        <img src="<?= BASE_ASSETS_UPLOADS . $product['image_url'] ?>" alt="<?= htmlspecialchars($product['product_name']) ?>" width="100px">
                    <?php else : ?>
                        N/A
                    <?php endif; ?>
                </td>
                <td><?= number_format($product['price'], 0, ',', '.') ?> đ</td>
                <td><?= $product['stock_quantity'] ?></td>
                <td><?= htmlspecialchars($product['status']) ?></td>
                <td>
                    <a href="<?= BASE_URL_ADMIN ?>&action=products-show&id=<?= $product['product_id'] ?>" class="btn btn-info btn-sm">Xem</a>
                    <a href="<?= BASE_URL_ADMIN ?>&action=products-edit&id=<?= $product['product_id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                    <a href="<?= BASE_URL_ADMIN ?>&action=products-delete&id=<?= $product['product_id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger btn-sm">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once PATH_VIEW_ADMIN . 'default/footer.php'; ?>

