<?php require_once PATH_VIEW_CLIENT . 'default/header.php' ?>
<main>
    <form class="payment" action="?action=place-order" method="POST">
        <div class="payment__left">
            <h1 class="left__title">Thanh toán</h1>

            <div class="left__section">
                <h2 class="section__title">Thông tin giao hàng</h2>
                <div class="form__group">
                    <input type="text" name="full_name" class="form__input" placeholder="Họ và tên" value="<?= htmlspecialchars($_SESSION['user']['full_name'] ?? '') ?>" required>
                </div>
                <div class="form__group">
                    <input type="email" name="email" class="form__input" placeholder="Email" value="<?= htmlspecialchars($_SESSION['user']['email'] ?? '') ?>" required>
                </div>
                <div class="form__group">
                    <input type="text" name="phone_number" class="form__input" placeholder="Số điện thoại" value="<?= htmlspecialchars($_SESSION['user']['phone_number'] ?? '') ?>" required>
                </div>
                <div class="form__group">
                    <input type="text" name="shipping_address" class="form__input" placeholder="Địa chỉ nhận hàng" value="<?= htmlspecialchars($_SESSION['user']['address'] ?? '') ?>" required>
                </div>
                <div class="form__group">
                    <textarea name="notes" class="form__input" placeholder="Ghi chú cho đơn hàng (tùy chọn)" rows="3"></textarea>
                </div>
            </div>

            <p class="payment__note">
                Toàn bộ các giao dịch được bảo mật và mã hóa.
            </p>

            <div class="payment__methods">
                <h2 class="section__title">Phương thức thanh toán</h2>
                <div class="method__option selected">
                    <input type="radio" name="payment_method" id="payment_cod" value="cod" class="method__radio" checked>
                    <label for="payment_cod" class="method__text">Thanh toán khi nhận hàng (COD)</label>
                </div>

                <div class="method__option">
                    <input type="radio" name="payment_method" id="payment_vnpay" value="vnpay" class="method__radio">
                    <label for="payment_vnpay" class="method__text">Thanh toán qua VNPAY</label>
                </div>

                <div class="method__option">
                    <input type="radio" name="payment_method" id="payment_momo" value="momo" class="method__radio">
                    <label for="payment_momo" class="method__text">Thanh toán qua MoMo</label>
                </div>
            </div>
        </div>

        <div class="payment__right">
            <div class="order-summary">
                <h2 class="summary-title">Đơn hàng của bạn</h2>
                <div class="summary-items">
                    <?php foreach ($cartItems as $item) : ?>
                    <div class="summary-item">
                        <div class="item-image">
                            <img src="<?= BASE_ASSETS_UPLOADS . htmlspecialchars($item['image_url']) ?>" alt="<?= htmlspecialchars($item['product_name']) ?>">
                            <span class="item-quantity"><?= $item['quantity'] ?></span>
                        </div>
                        <div class="item-name"><?= htmlspecialchars($item['product_name']) ?></div>
                        <div class="item-price"><?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?>đ</div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <div class="summary-totals">
                    <div class="summary__row">
                        <span class="summary__label">Tạm tính</span>
                        <span class="summary__value"><?= number_format($subTotal, 0, ',', '.') ?>đ</span>
                    </div>
                    <div class="summary__row">
                        <span class="summary__label">Phí vận chuyển</span>
                        <span class="summary__value"><?= number_format($shippingFee, 0, ',', '.') ?>đ</span>
                    </div>
                    <div class="summary__row total-row">
                        <span class="summary__label">Tổng cộng:</span>
                        <span class="summary__value"><?= number_format($total, 0, ',', '.') ?>đ</span>
                    </div>
                </div>
            </div>

            <button type="submit" class="checkout__btn">
                Đặt hàng ngay
            </button>
        </div>
    </form>
</main>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const paymentOptions = document.querySelectorAll('.method__option');

    paymentOptions.forEach(option => {
        option.addEventListener('click', function() {
            // Remove 'selected' class from all options
            paymentOptions.forEach(opt => opt.classList.remove('selected'));
            
            // Add 'selected' class to the clicked option
            this.classList.add('selected');
            
            // Check the radio button inside
            this.querySelector('input[type="radio"]').checked = true;
        });
    });
});
</script>
<?php require_once PATH_VIEW_CLIENT . 'default/footer.php' ?>