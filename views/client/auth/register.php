<?php require_once PATH_VIEW_CLIENT . 'default/header.php' ?>
<main class="main__register">
    <form class="register-form" id="registerForm">
        <h1 class="register-form__title">Tạo tài khoản</h1>

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

        <button type="submit" class="register-form__button">Tạo tài khoản</button>
        <div class="register-form__divider">Bạn đã có tài khoản?</div>
        <a href="?action=login" class="register-form__register-link">Đăng nhập ngay</a>
    </form>
</main>
<?php require_once PATH_VIEW_CLIENT . 'default/footer.php' ?>