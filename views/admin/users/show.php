<?php require_once PATH_VIEW_ADMIN . 'default/header.php'; ?>

<div class="card">
    <div class="card-header">
        <h2>Chi tiết người dùng</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 text-center">
                <?php if (!empty($data['avatar'])) : ?>
                    <img src="<?= BASE_ASSETS_UPLOADS . $data['avatar'] ?>" alt="<?= htmlspecialchars($data['username']) ?>" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                <?php else : ?>
                    <p>Chưa có ảnh đại diện</p>
                <?php endif; ?>
            </div>
            <div class="col-md-8">
                <h5 class="card-title">ID: <?= $data['user_id'] ?></h5>
                <p class="card-text"><strong>Tên đăng nhập:</strong> <?= htmlspecialchars($data['username']) ?></p>
                <p class="card-text"><strong>Email:</strong> <?= htmlspecialchars($data['email']) ?></p>
                <p class="card-text"><strong>Họ và tên:</strong> <?= htmlspecialchars($data['full_name'] ?? 'Chưa cập nhật') ?></p>
                <p class="card-text"><strong>Số điện thoại:</strong> <?= htmlspecialchars($data['phone_number'] ?? 'Chưa cập nhật') ?></p>
                <p class="card-text"><strong>Mật khẩu:</strong> <?= htmlspecialchars($data['password_hash'] ?? 'Chưa cập nhật') ?></p>
                <p class="card-text"><strong>Địa chỉ:</strong> <?= htmlspecialchars($data['address'] ?? 'Chưa cập nhật') ?></p>
                <p class="card-text"><strong>Loại tài khoản:</strong> <span class="badge bg-primary"><?= htmlspecialchars($data['user_type']) ?></span></p>
            </div>
        </div>
        <hr>
        <p><small class="text-muted">Ngày đăng ký: <?= date('d/m/Y H:i:s', strtotime($data['registransion_date'])) ?></small></p>
        <p><small class="text-muted">Đăng nhập lần cuối: <?= !empty($data['last_login']) ? date('d/m/Y H:i:s', strtotime($data['last_login'])) : 'Chưa đăng nhập' ?></small></p>

        <a href="<?= BASE_URL_ADMIN ?>&action=users" class="btn btn-secondary">Quay lại danh sách</a>
        <a href="<?= BASE_URL_ADMIN ?>&action=users-edit&id=<?= $data['user_id'] ?>" class="btn btn-warning">Sửa</a>
    </div>
</div>

<?php require_once PATH_VIEW_ADMIN . 'default/footer.php'; ?>
