<?php require_once PATH_VIEW_ADMIN . 'default/header.php'; ?>

<a href="<?= BASE_URL_ADMIN ?>&action=categories-create" class="btn btn-primary mb-3">Thêm mới danh mục</a>

<table class="table table-striped table-hover border">
    <thead>
        <tr>
            <th>ID</th>
            <th>Danh mục sản phẩm</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $category) : ?>
            <tr>
                <td><?= $category['category_id'] ?></td>
                <td><?= htmlspecialchars($category['category_name']) ?></td>
                <td>
                    <a href="<?= BASE_URL_ADMIN ?>&action=categories-show&id=<?= $category['category_id'] ?>" class="btn btn-info btn-sm">Xem</a>
                    <a href="<?= BASE_URL_ADMIN ?>&action=categories-edit&id=<?= $category['category_id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                    <a href="<?= BASE_URL_ADMIN ?>&action=categories-delete&id=<?= $category['category_id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger btn-sm">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once PATH_VIEW_ADMIN . 'default/footer.php'; ?>
