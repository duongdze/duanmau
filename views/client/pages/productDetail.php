<?php require_once PATH_VIEW_CLIENT . 'default/header.php' ?>
<main class="productDetail">
    <div class="productDetail__main--container">
        <div class="productDetail__container--left">
            <div class="container__left--img">
                <img src="<?= BASE_ASSETS_UPLOADS ?><?= htmlspecialchars($product['image_url']) ?>" alt="<?= htmlspecialchars($product['product_name']) ?>">
            </div>
        </div>
        <div class="productDetail__container--right">
            <div class="product-info__meta">
                <span>Thương hiệu: <a href="#"><?= htmlspecialchars($product['brand']) ?></a></span>
                <span>Danh mục: <a href="#"><?= htmlspecialchars($product['category_name']) ?></a></span>
            </div>
            <h1 class="product-info__name"><?= htmlspecialchars($product['product_name']) ?></h1>
            <div class="product-info__rating">
                <span>★★★★★</span>
                <a href="#reviews">(Xem 3 đánh giá)</a>
            </div>
            <div class="product-info__price">
                <!-- Bạn có thể thêm logic cho giá cũ/giá khuyến mãi ở đây nếu có -->
                <!-- <span class="price--old">1,295,000<u>đ</u></span> -->
                <span class="price--new"><?= number_format($product['price'], 0, ',', '.') ?><u>đ</u></span>
            </div>
            <div class="product-info__description">
                <p><?= nl2br(htmlspecialchars($product['description'])) ?></p>
            </div>

            <!-- Các tùy chọn màu sắc và kích thước sẽ được làm động ở các bước sau -->
            <div class="product-info__options">
                <div class="options__group">
                    <label class="options__label">Màu sắc:</label>
                    <div class="options__colors">
                        <button class="color-option" style="background-color: #000000;" title="Đen"></button>
                        <button class="color-option" style="background-color: #FFFFFF; border: 1px solid #ccc;" title="Trắng"></button>
                        <button class="color-option selected" style="background-color: #d9a4a4;" title="Hồng"></button>
                    </div>
                </div>
                <div class="options__group">
                    <label class="options__label">Kích thước:</label>
                    <div class="options__sizes">
                        <button class="size-option">39</button>
                        <button class="size-option selected">40</button>
                        <button class="size-option">41</button>
                        <button class="size-option">42</button>
                        <button class="size-option disabled">43</button>
                    </div>
                </div>
            </div>
            <div class="product-info__actions">

                <button class="actions__add-to-cart">Thêm vào giỏ hàng</button>
            </div>
        </div>
    </div>
</main>
<?php require_once PATH_VIEW_CLIENT . 'default/footer.php' ?>