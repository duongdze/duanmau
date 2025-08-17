<?php require_once PATH_VIEW_CLIENT . 'default/header.php'; ?>

<main class="profile-page" style="padding: 40px 0; background-color: #f9f9f9;">
    <div class="container">
        <div class="main__container--header text-center mb-5">
            <h1>Hồ sơ cá nhân</h1>
            <p>Quản lý thông tin cá nhân của bạn để bảo mật tài khoản</p>
        </div>

        <div class="row">
            <div class="col-md-8 mx-auto">
                
                <?php if (isset($_SESSION['success'])) : ?>
                    <div class="alert alert-success"><?= htmlspecialchars($_SESSION['success']) ?></div>
                    <?php unset($_SESSION['success']); ?>
                <?php endif; ?>
                <?php if (isset($_SESSION['error'])) : ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($_SESSION['error']) ?></div>
                    <?php unset($_SESSION['error']); ?>
                <?php endif; ?>

                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Thông tin tài khoản</h5>
                        <hr>
                        <form action="<?= BASE_URL ?>?action=profile-update" method="POST">
                            <input type="hidden" name="form_type" value="info">
                            <div class="mb-3 row">
                                <label for="username" class="col-sm-3 col-form-label">Tên đăng nhập</label>
                                <div class="col-sm-9">
                                    <input type="text" readonly class="form-control-plaintext" id="username" value="<?= htmlspecialchars($_SESSION['user']['username']) ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" readonly class="form-control-plaintext" id="email" value="<?= htmlspecialchars($_SESSION['user']['email']) ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="full_name" class="col-sm-3 col-form-label">Họ và tên</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="full_name" name="full_name" value="<?= htmlspecialchars($_SESSION['user']['full_name'] ?? '') ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="phone_number" class="col-sm-3 col-form-label">Số điện thoại</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= htmlspecialchars($_SESSION['user']['phone_number'] ?? '') ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="address" class="col-sm-3 col-form-label">Địa chỉ</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="address" name="address" rows="3"><?= htmlspecialchars($_SESSION['user']['address'] ?? '') ?></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-9 offset-sm-3">
                                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Đổi mật khẩu</h5>
                        <hr>
                        <form action="<?= BASE_URL ?>?action=profile-update" method="POST">
                            <input type="hidden" name="form_type" value="password">
                             <div class="mb-3 row"><label for="current_password" class="col-sm-3 col-form-label">Mật khẩu hiện tại</label><div class="col-sm-9"><input type="password" class="form-control" id="current_password" name="current_password" required></div></div>
                             <div class="mb-3 row"><label for="new_password" class="col-sm-3 col-form-label">Mật khẩu mới</label><div class="col-sm-9"><input type="password" class="form-control" id="new_password" name="new_password" required></div></div>
                             <div class="mb-3 row"><label for="confirm_password" class="col-sm-3 col-form-label">Xác nhận mật khẩu</label><div class="col-sm-9"><input type="password" class="form-control" id="confirm_password" name="confirm_password" required></div></div>
                            <div class="mb-3 row"><div class="col-sm-9 offset-sm-3"><button type="submit" class="btn btn-danger">Đổi mật khẩu</button></div></div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>

<?php require_once PATH_VIEW_CLIENT . 'default/footer.php'; ?>