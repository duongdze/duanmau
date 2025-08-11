<?php require_once PATH_VIEW_CLIENT . 'default/header.php' ?>
<main class="cart">
    <div class="cart__header">
        <h1 class="cart__title">Giỏ hàng của bạn</h1>
        <p class="cart__subtitle">Xem lại các sản phẩm bạn đã chọn</p>
    </div>

    <div class="cart__container">
        <div class="cart__items">
            <div class="items__header">
                <h2 class="items__title">Sản phẩm</h2>
                <span class="items__count">3 sản phẩm</span>
            </div>

            <div class="cart__item">
                <div class="item__image">👟</div>
                <div class="item__details">
                    <h3 class="item__name">Giày Nike Air Max 270</h3>
                    <p class="item__description">Màu trắng, Size 42</p>
                    <div class="item__price">2.500.000đ</div>
                </div>
                <div class="item__actions">
                    <div class="quantity__control">
                        <button class="quantity__btn" onclick="updateQuantity(this, -1)">−</button>
                        <input type="number" value="1" class="quantity__input" readonly>
                        <button class="quantity__btn" onclick="updateQuantity(this, 1)">+</button>
                    </div>
                    <button class="item__remove" onclick="removeItem(this)">🗑️</button>
                </div>
            </div>

            <div class="cart__item">
                <div class="item__image">👕</div>
                <div class="item__details">
                    <h3 class="item__name">Áo thun Adidas Original</h3>
                    <p class="item__description">Màu đen, Size L</p>
                    <div class="item__price">950.000đ</div>
                </div>
                <div class="item__actions">
                    <div class="quantity__control">
                        <button class="quantity__btn" onclick="updateQuantity(this, -1)">−</button>
                        <input type="number" value="2" class="quantity__input" readonly>
                        <button class="quantity__btn" onclick="updateQuantity(this, 1)">+</button>
                    </div>
                    <button class="item__remove" onclick="removeItem(this)">🗑️</button>
                </div>
            </div>

            <div class="cart__item">
                <div class="item__image">🧢</div>
                <div class="item__details">
                    <h3 class="item__name">Mũ lưỡi trai Supreme</h3>
                    <p class="item__description">Màu đỏ, Freesize</p>
                    <div class="item__price">1.200.000đ</div>
                </div>
                <div class="item__actions">
                    <div class="quantity__control">
                        <button class="quantity__btn" onclick="updateQuantity(this, -1)">−</button>
                        <input type="number" value="1" class="quantity__input" readonly>
                        <button class="quantity__btn" onclick="updateQuantity(this, 1)">+</button>
                    </div>
                    <button class="item__remove" onclick="removeItem(this)">🗑️</button>
                </div>
            </div>
        </div>

        <div class="cart__summary">
            <h3 class="summary__title">Tóm tắt đơn hàng</h3>

            <div class="summary__row">
                <span class="summary__label">Tạm tính</span>
                <span class="summary__value" id="subtotal">5.650.000đ</span>
            </div>

            <div class="summary__row">
                <span class="summary__label">Phí vận chuyển</span>
                <span class="summary__value">50.000đ</span>
            </div>

            <div class="summary__discount">
                <div class="discount__text">Giảm giá thành viên VIP</div>
                <div class="discount__amount">-200.000đ</div>
            </div>

            <div class="summary__row">
                <span class="summary__label">Tổng cộng</span>
                <span class="summary__value" id="total">5.500.000đ</span>
            </div>

            <button class="summary__checkout" onclick="checkout()">
                <a href="?action=payment">Thanh toán ngay</a>
            </button>

            <button class="summary__continue" onclick="continueShopping()">
                Tiếp tục mua sắm
            </button>
        </div>
    </div>
</main>
<?php require_once PATH_VIEW_CLIENT . 'default/footer.php' ?>