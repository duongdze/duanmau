<?php include PATH_VIEW_ADMIN . '/default/header.php'; ?>

<a href="<?= BASE_URL_ADMIN ?>&action=users-create" class="btn btn-primary mb-3">Thêm mới người dùng</a>

<table class="table table-striped table-hover border">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên đăng nhập</th>
            <th>Email</th>
            <th>Họ và tên</th>
            <th>Số điện thoại</th>
            <th>Loại tài khoản</th>
            <th>Hành động</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($data as $user) : ?>
            <tr>
                <td><?= $user['user_id'] ?></td>
                <td><?= htmlspecialchars($user['username']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= htmlspecialchars($user['full_name']) ?></td>
                <td><?= htmlspecialchars($user['phone_number'] ?? 'Chưa cập nhật') ?></td>
                <td><?= htmlspecialchars($user['user_type']) ?></td>
                <td>
                    <a href="<?= BASE_URL_ADMIN . '&action=users-show&id=' . $user['user_id'] ?>" class="btn btn-info btn-sm">Xem</a>
                    <a href="<?= BASE_URL_ADMIN . '&action=users-edit&id=' . $user['user_id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                    <a href="<?= BASE_URL_ADMIN . '&action=users-delete&id=' . $user['user_id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger btn-sm">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

