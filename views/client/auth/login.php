<?php require_once PATH_VIEW_CLIENT . 'default/header.php' ?>
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
<?php require_once PATH_VIEW_CLIENT . 'default/footer.php' ?>