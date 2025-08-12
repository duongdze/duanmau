<?php include PATH_VIEW_ADMIN . '/default/header.php'; ?>

<div class="card">
    <div class="card-header">
        <h1 class="h5">Cập nhật danh mục</h1>
    </div>
    <div class="card-body">
        <form action="<?= BASE_URL_ADMIN ?>&action=categories-update" method="POST">
            <input type="hidden" name="category_id" value="<?= $category['category_id'] ?>">
            
            <div class="mb-3">
                <label for="category_name" class="form-label">Tên danh mục:</label>
                <input type="text" class="form-control" id="category_name" name="category_name" value="<?= htmlspecialchars($category['category_name']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mô tả:</label>
                <textarea class="form-control" id="description" name="description" rows="3"><?= htmlspecialchars($category['description']) ?></textarea>
            </div>

            <button type="submit" class="btn btn-warning">Cập nhật</button>
            <a href="<?= BASE_URL_ADMIN ?>&action=categories" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</div>

<?php include PATH_VIEW_ADMIN . '/default/footer.php'; ?>
