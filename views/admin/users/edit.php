<?php include PATH_VIEW_ADMIN . '/default/header.php'; ?>

<div class="card">
    <div class="card-header">
        <h1 class="h5">Cập nhật người dùng: <?= htmlspecialchars($user['username']) ?></h1>
    </div>
    <div class="card-body">
        <form action="<?= BASE_URL_ADMIN ?>&action=users-update" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="username" class="form-label">Tên đăng nhập:</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= htmlspecialchars($user['username']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu mới:</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <small class="form-text text-muted">Để trống nếu không muốn thay đổi mật khẩu.</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="full_name" class="form-label">Họ và tên:</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" value="<?= htmlspecialchars($user['full_name']) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Số điện thoại:</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= htmlspecialchars($user['phone_number']) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="user_type" class="form-label">Loại tài khoản:</label>
                        <select class="form-select" id="user_type" name="user_type" required>
                            <option value="customer" <?= ($user['user_type'] == 'customer') ? 'selected' : '' ?>>Customer</option>
                            <option value="admin" <?= ($user['user_type'] == 'admin') ? 'selected' : '' ?>>Admin</option>
                        </select>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-warning">Cập nhật</button>
            <a href="<?= BASE_URL_ADMIN ?>&action=users" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</div>

<?php include PATH_VIEW_ADMIN . '/default/footer.php'; ?>
