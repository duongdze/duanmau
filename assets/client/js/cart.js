let cartItems = [
            { name: 'Giày Nike Air Max 270', price: 2500000, quantity: 1 },
            { name: 'Áo thun Adidas Original', price: 950000, quantity: 2 },
            { name: 'Mũ lưỡi trai Supreme', price: 1200000, quantity: 1 }
        ];

        function updateQuantity(button, change) {
            const input = button.parentNode.querySelector('.quantity__input');
            let newValue = parseInt(input.value) + change;
            
            if (newValue < 1) newValue = 1;
            if (newValue > 99) newValue = 99;
            
            input.value = newValue;
            
            // Update item in array
            const itemIndex = Array.from(document.querySelectorAll('.cart__item')).indexOf(button.closest('.cart__item'));
            if (cartItems[itemIndex]) {
                cartItems[itemIndex].quantity = newValue;
            }
            
            updateTotals();
            
            // Animation effect
            button.style.transform = 'scale(0.9)';
            setTimeout(() => {
                button.style.transform = 'scale(1)';
            }, 150);
        }

        function removeItem(button) {
            const item = button.closest('.cart__item');
            const itemIndex = Array.from(document.querySelectorAll('.cart__item')).indexOf(item);
            
            // Remove from array
            cartItems.splice(itemIndex, 1);
            
            // Animate removal
            item.style.transform = 'translateX(-100%)';
            item.style.opacity = '0';
            
            setTimeout(() => {
                item.remove();
                updateTotals();
                updateItemCount();
                
                // Check if cart is empty
                if (cartItems.length === 0) {
                    showEmptyCart();
                }
            }, 300);
        }

        function updateTotals() {
            const subtotal = cartItems.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            const shipping = 50000;
            const discount = 200000;
            const total = subtotal + shipping - discount;
            
            document.getElementById('subtotal').textContent = formatPrice(subtotal);
            document.getElementById('total').textContent = formatPrice(total);
        }

        function updateItemCount() {
            const count = cartItems.reduce((sum, item) => sum + item.quantity, 0);
            document.querySelector('.items__count').textContent = `${count} sản phẩm`;
        }

        function formatPrice(price) {
            return new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND'
            }).format(price);
        }

        function showEmptyCart() {
            const container = document.querySelector('.cart__container');
            container.innerHTML = `
                <div class="cart__empty">
                    <div class="empty__icon">🛒</div>
                    <h2 class="empty__title">Giỏ hàng trống</h2>
                    <p class="empty__text">Bạn chưa có sản phẩm nào trong giỏ hàng</p>
                    <button class="empty__button" onclick="continueShopping()">
                        Bắt đầu mua sắm
                    </button>
                </div>
            `;
        }

        // function checkout() {
        //     // Animate checkout button
        //     const btn = document.querySelector('.summary__checkout');
        //     btn.style.transform = 'scale(0.95)';
        //     btn.textContent = 'Đang xử lý...';
            
        //     setTimeout(() => {
        //         alert('🎉 Đặt hàng thành công! Cảm ơn bạn đã mua sắm tại Furstep.');
        //         btn.style.transform = 'scale(1)';
        //         btn.textContent = 'Thanh toán ngay';
        //     }, 1000);
        // }

        function continueShopping() {
            alert('Chuyển về trang sản phẩm...');
        }

        // Add some interactive effects
        document.querySelectorAll('.cart__item').forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.01)';
            });
            
            item.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
            });
        });

        // Initialize
        updateTotals();