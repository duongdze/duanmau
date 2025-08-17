<?php require_once PATH_VIEW_CLIENT . 'default/header.php' ?>
<main class="cart">
    <div class="cart__header">
        <h1 class="cart__title">Giỏ hàng của bạn</h1>
        <p class="cart__subtitle">Xem lại các sản phẩm bạn đã chọn</p>
    </div>

    <form class="cart__container" action="?action=cart-update-and-checkout" method="POST">
        <div class="cart__items">
            <div class="items__header">
                <h2 class="items__title">Sản phẩm</h2>
                <span class="items__count"><?= !empty($cartItems) ? count($cartItems) : 0 ?> sản phẩm</span>
            </div>

            <?php if (empty($cartItems)) : ?>
                <div class="cart-empty" style="text-align: center; padding: 50px 0;">
                    <p>Giỏ hàng của bạn đang trống.</p>
                    <a href="<?= BASE_URL ?>" class="btn btn-primary mt-3">Tiếp tục mua sắm</a>
                </div>
            <?php else : ?>
                <?php foreach ($cartItems as $productID => $item) : ?>
                    <div class="cart__item">
                        <div class="item__image">
                            <img src="<?= BASE_ASSETS_UPLOADS . htmlspecialchars($item['image_url']) ?>" alt="<?= htmlspecialchars($item['product_name']) ?>" style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                        </div>
                        <div class="item__details">
                            <h3 class="item__name"><?= htmlspecialchars($item['product_name']) ?></h3>
                            <p class="item__description">Đơn giá: <?= number_format($item['price'], 0, ',', '.') ?>đ</p>
                            <div class="item__price">Thành tiền: <span class="item-total-price"><?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?></span>đ</div>
                        </div>
                        <div class="item__actions">
                            <div class="quantity__control" data-price="<?= $item['price'] ?>">
                                <button type="button" class="quantity__btn quantity-minus">−</button>
                                <input type="text" name="quantities[<?= $productID ?>]" value="<?= $item['quantity'] ?>" class="quantity__input" min="1">
                                <button type="button" class="quantity__btn quantity-plus">+</button>
                            </div>
                            <a href="?action=cart-remove&id=<?= $productID ?>" class="item__remove" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này khỏi giỏ hàng?')">🗑️</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>

        <?php if (!empty($cartItems)) : ?>
            <div class="cart__summary">
                <h3 class="summary__title">Tóm tắt đơn hàng</h3>

                <div class="summary__row">
                    <span class="summary__label">Tạm tính</span>
                    <span class="summary__value" id="subtotal"><?= number_format($subTotal, 0, ',', '.') ?>đ</span>
                </div>

                <div class="summary__row">
                    <span class="summary__label">Phí vận chuyển</span>
                    <span class="summary__value"><?= number_format($shippingFee, 0, ',', '.') ?>đ</span>
                </div>

                <div class="summary__row total-row">
                    <span class="summary__label">Tổng cộng</span>
                    <span class="summary__value" id="total"><?= number_format($total, 0, ',', '.') ?>đ</span>
                </div>

                <button type="submit" class="summary__checkout">Thanh toán ngay</button>

                <a href="<?= BASE_URL ?>" class="summary__continue">Tiếp tục mua sắm</a>
            </div>
        <?php endif; ?>
    </form>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const quantityControls = document.querySelectorAll('.quantity__control');

    quantityControls.forEach(control => {
        const minusBtn = control.querySelector('.quantity-minus');
        const plusBtn = control.querySelector('.quantity-plus');
        const quantityInput = control.querySelector('.quantity__input');

        minusBtn.addEventListener('click', function() {
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
                updateItemAndCartTotals(control, quantityInput.value);
            }
        });

        plusBtn.addEventListener('click', function() {
            let currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
            updateItemAndCartTotals(control, quantityInput.value);
        });

        quantityInput.addEventListener('change', function() {
            let currentValue = parseInt(quantityInput.value);
            if (currentValue < 1 || isNaN(currentValue)) {
                quantityInput.value = 1;
            }
            updateItemAndCartTotals(control, quantityInput.value);
        });
    });

    function updateItemAndCartTotals(control, quantity) {
        const price = parseFloat(control.dataset.price);
        const itemTotalPriceElement = control.closest('.cart__item').querySelector('.item-total-price');
        
        // Update individual item total
        itemTotalPriceElement.textContent = (price * quantity).toLocaleString('vi-VN');

        // Update cart summary
        updateCartSummary();
    }

    function updateCartSummary() {
        let subTotal = 0;
        document.querySelectorAll('.cart__item').forEach(item => {
            const price = parseFloat(item.querySelector('.quantity__control').dataset.price);
            const quantity = parseInt(item.querySelector('.quantity__input').value);
            subTotal += price * quantity;
        });

        const shippingFee = <?= $shippingFee ?? 0 ?>;
        const total = subTotal + shippingFee;

        document.getElementById('subtotal').textContent = subTotal.toLocaleString('vi-VN') + 'đ';
        document.getElementById('total').textContent = total.toLocaleString('vi-VN') + 'đ';
    }
});
</script>

<?php require_once PATH_VIEW_CLIENT . 'default/footer.php' ?>