<?php include PATH_VIEW_ADMIN . '/default/header.php'; ?>

<div class="card">
    <div class="card-header">
        <h1 class="h5">Thêm mới người dùng</h1>
    </div>
    <div class="card-body">
        <form action="<?= BASE_URL_ADMIN ?>&action=users-store" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="username" class="form-label">Tên đăng nhập:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Xác nhận mật khẩu:</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="full_name" class="form-label">Họ và tên:</label>
                        <input type="text" class="form-control" id="full_name" name="full_name">
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Số điện thoại:</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number">
                    </div>
                    <div class="mb-3">
                        <label for="user_type" class="form-label">Loại tài khoản:</label>
                        <select class="form-select" id="user_type" name="user_type" required>
                            <option value="customer" selected>Customer</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="avatar" class="form-label">Ảnh đại diện:</label>
                        <input type="file" class="form-control" id="avatar" name="avatar">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Thêm mới</button>
            <a href="<?= BASE_URL_ADMIN ?>&action=users" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</div>

<?php include PATH_VIEW_ADMIN . '/default/footer.php'; ?>