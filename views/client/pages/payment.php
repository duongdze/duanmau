<?php require_once PATH_VIEW_CLIENT . 'default/header.php' ?>
<main class="payment">
    <div class="payment__left">
        <h1 class="left__title">Thanh toán</h1>

        <div class="left__section">
            <h2 class="section__title">Địa chỉ giao hàng</h2>
            <div class="form__group">
                <input type="text" class="form__input" placeholder="Tỉnh/Thành phố">
            </div>
            <div class="form__row">
                <input type="text" class="form__input" placeholder="Chọn Quận/Huyện">
                <input type="text" class="form__input" placeholder="Chọn Phường/Xã">
            </div>
            <div class="form__group">
                <input type="text" class="form__input" placeholder="Địa chỉ nhận hàng">
            </div>
            <div class="form__group">
                <input type="text" class="form__input" placeholder="Số điện thoại">
            </div>
        </div>

        <p class="payment__note">
            Địa chỉ thanh toán của phương thức thanh toán phải khớp với địa chỉ giao hàng. Toàn bộ các giao dịch được bảo mật và mã hóa.
        </p>

        <div class="payment__methods">
            <div class="method__option selected" onclick="selectPaymentMethod(this)">
                <input type="radio" name="payment" class="method__radio" checked>
                <span class="method__text">Cổng OnePAY - Thẻ ATM/QR/MoMo</span>
            </div>

            <div class="method__option" onclick="selectPaymentMethod(this)">
                <input type="radio" name="payment" class="method__radio">
                <span class="method__text">Ví ZaloPay</span>
            </div>

            <div class="method__option" onclick="selectPaymentMethod(this)">
                <input type="radio" name="payment" class="method__radio">
                <span class="method__text">Thanh toán MoMo qua OnePay</span>
            </div>

            <div class="method__option" onclick="selectPaymentMethod(this)">
                <input type="radio" name="payment" class="method__radio">
                <span class="method__text">Thanh toán khi nhận hàng (COD)</span>
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
                    <span class="summary__label">Tổng tiền hàng</span>
                    <span class="summary__value">100.000₫</span>
                </div>
                <div class="summary__row">
                    <span class="summary__label">Phí vận chuyển</span>
                    <span class="summary__value">Miễn phí</span>
                </div>
                <div class="summary__row">
                    <span class="summary__label">Tổng:</span>
                    <span class="summary__value">100.000₫</span>
                </div>
            </div>
        </div>

        <button class="checkout__btn" onclick="processPayment()">
            Đặt hàng ngay
        </button>
    </div>
</main>
<?php require_once PATH_VIEW_CLIENT . 'default/footer.php' ?>