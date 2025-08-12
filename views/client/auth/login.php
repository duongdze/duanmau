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
    <main class="main__login">
        <form class="login-form" id="loginForm">
            <h1 class="login-form__title">Đăng nhập</h1>
            <div class="login-form__group">
                <input
                    type="text"
                    class="login-form__input"
                    id="username"
                    name="username"
                    placeholder="Tên tài khoản hoặc địa chỉ email"
                    required>
            </div>
            <div class="login-form__group">
                <input
                    type="password"
                    class="login-form__input"
                    id="password"
                    name="password"
                    placeholder="Mật khẩu"
                    required>
            </div>
            <button type="submit" class="login-form__button">
                Đăng nhập
            </button>
            <div class="login-form__links">
                <a href="#" class="login-form__link">Lưu tài khoản</a>
                <a href="#" class="login-form__link">Quên mật khẩu ?</a>
            </div>
            <div class="login-form__divider">
                Bạn chưa có tài khoản ?
            </div>
            <a href="?action=register" class="login-form__register-link">Tạo tài khoản</a>
        </form>
    </main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
<script src="<?= BASE_ASSETS_CLIENT ?>js/cart.js"></script>

</body>

</html>