<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="<?= BASE_ASSETS_CLIENT ?>css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

</head>

<body>
    <main class="main__register">
        <form class="register-form" id="registerForm" action="?action=handle-register" method="POST">
            <h1 class="register-form__title">Tạo tài khoản</h1>

            <?php if (isset($_SESSION['error'])) : ?>
                <div class="alert alert-danger" style="padding: 10px; margin-bottom: 15px; border-radius: 5px;">
                    <?= $_SESSION['error'] ?>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <div class="register-form__group">
                <input
                    type="text"
                    class="register-form__input"
                    id="fullName"
                    name="fullName"
                    placeholder="Họ và tên"
                    required>
            </div>

            <div class="register-form__group">
                <input
                    type="email"
                    class="register-form__input"
                    id="email"
                    name="email"
                    placeholder="Địa chỉ email"
                    required>
            </div>

            <div class="register-form__group">
                <input
                    type="text"
                    class="register-form__input"
                    id="username"
                    name="username"
                    placeholder="Tên tài khoản"
                    required>
            </div>

            <div class="register-form__group">
                <input
                    type="password"
                    class="register-form__input"
                    id="password"
                    name="password"
                    placeholder="Mật khẩu"
                    required>
            </div>

            <div class="register-form__group">
                <input
                    type="password"
                    class="register-form__input"
                    id="confirmPassword"
                    name="confirmPassword"
                    placeholder="Xác nhận mật khẩu"
                    required>
            </div>

            <a href="?action=login"><button type="submit" class="register-form__button">Tạo tài khoản</button></a>
            <div class="register-form__divider">Bạn đã có tài khoản?</div>
            <a href="?action=login" class="register-form__register-link">Đăng nhập ngay</a>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <script src="<?= BASE_ASSETS_CLIENT ?>js/cart.js"></script>
</body>

</html>