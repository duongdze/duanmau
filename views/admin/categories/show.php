<?php require_once PATH_VIEW_ADMIN . 'default/header.php'; ?>

<div class="card">
    <div class="card-header">
        <h2>Chi tiết danh mục</h2>
    </div>
    <div class="card-body">
        <h5 class="card-title">ID: <?= $data['category_id'] ?></h5>
        <p class="card-text"><strong>Tên danh mục:</strong> <?= htmlspecialchars($data['category_name']) ?></p>
        <p class="card-text"><strong>Mô tả:</strong> <?= nl2br(htmlspecialchars($data['description'] ?? 'Không có mô tả.')) ?></p>
        <p class="card-text"><small class="text-muted">Ngày tạo: <?= date('d/m/Y H:i:s', strtotime($data['created_at'])) ?></small></p>
        
        <a href="<?= BASE_URL_ADMIN ?>&action=categories" class="btn btn-secondary">Quay lại danh sách</a>
    </div>
</div>

<?php require_once PATH_VIEW_ADMIN . 'default/footer.php'; ?>
