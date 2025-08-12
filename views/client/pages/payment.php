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
        <div class="right__product">
            <div class="product__info">
                <div class="product__info--image">👟</div>
                <div class="product__details">
                    <div class="product__name">Sản phẩm</div>
                    <div class="product__price">1.279.000₫</div>
                </div>
            </div>

            <div class="product__actions">
                <button class="action__btn action__btn--promo">Nhập mã khuyến mãi</button>
                <button class="action__btn action__btn--apply">Áp dụng</button>
            </div>

            <div class="order__summary">
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