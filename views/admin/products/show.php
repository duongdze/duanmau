<?php require_once PATH_VIEW_ADMIN . 'default/header.php'; ?>

<div class="card">
    <div class="card-header">
        <h2>Chi tiết sản phẩm</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <?php if (!empty($data['image_url'])) : ?>
                    <img src="<?= BASE_ASSETS_UPLOADS . $data['image_url'] ?>" alt="<?= htmlspecialchars($data['product_name']) ?>" class="img-fluid rounded">
                <?php else : ?>
                    <p>Không có ảnh</p>
                <?php endif; ?>
            </div>
            <div class="col-md-8">
                <h5 class="card-title">ID: <?= $data['product_id'] ?></h5>
                <p class="card-text"><strong>Tên sản phẩm:</strong> <?= htmlspecialchars($data['product_name']) ?></p>
                <p class="card-text"><strong>Danh mục:</strong> <?= htmlspecialchars($data['category_id']) ?></p>
                <p class="card-text"><strong>Giá:</strong> <?= number_format($data['price'], 0, ',', '.') ?> đ</p>
                <p class="card-text"><strong>Số lượng trong kho:</strong> <?= $data['stock_quantity'] ?></p>
                <p class="card-text"><strong>Trạng thái:</strong> <span class="badge bg-success"><?= htmlspecialchars($data['status']) ?></span></p>
                <p class="card-text"><strong>Thương hiệu:</strong> <?= htmlspecialchars($data['brand'] ?? 'N/A') ?></p>
            </div>
        </div>
        <hr>
        <h4>Mô tả sản phẩm</h4>
        <p><?= nl2br(htmlspecialchars($data['description'] ?? 'Không có mô tả.')) ?></p>
        <hr>
        <p><small class="text-muted">Ngày tạo: <?= date('d/m/Y H:i:s', strtotime($data['created_at'])) ?></small></p>
        <p><small class="text-muted">Cập nhật lần cuối: <?= date('d/m/Y H:i:s', strtotime($data['updated_at'])) ?></small></p>
        
        <a href="<?= BASE_URL_ADMIN ?>&action=products" class="btn btn-secondary">Quay lại danh sách</a>
        <a href="<?= BASE_URL_ADMIN ?>&action=products-edit&id=<?= $data['product_id'] ?>" class="btn btn-warning">Sửa</a>
    </div>
</div>

<?php require_once PATH_VIEW_ADMIN . 'default/footer.php'; ?>
