<?php require_once PATH_VIEW_CLIENT . 'default/header.php' ?>
<main class="bestsell">
    <div class="bestsell__main--container">
        <div class="main__container--header">
            <h1>Top sản phẩm bán chạy</h1>
            <div class="header--breadcrumb">
                <a href="#">Home</a> / Cửa hàng Furstep
            </div>
        </div>
        <div class="product-grid">
            <?php if (!empty($products)) : ?>
                <?php foreach ($products as $product) : ?>
                    <div class="product-card">
                        <div class="product-card__image">
                            <a href="?action=productdetail&id=<?= $product['product_id'] ?>">
                                <img src="<?= BASE_ASSETS_UPLOADS ?><?= htmlspecialchars($product['image_url']) ?>" alt="<?= htmlspecialchars($product['product_name']) ?>">
                            </a>
                        </div>
                        <div class="product-card__rate">
                            <p>★★★★★</p> <!-- Rating có thể làm động sau -->
                        </div>
                        <div class="product-card__title">
                            <?= htmlspecialchars($product['product_name']) ?>
                        </div>
                        <div class="product-card__brand">
                            <p><?= htmlspecialchars($product['brand']) ?></p>
                        </div>
                        <div class="product-card__price">
                            <!-- <div class="card__price--old"><strike>...</strike></div> -->
                            <div class="card__price--new">
                                <?= number_format($product['price'], 0, ',', '.') ?><u>đ</u>
                            </div>
                        </div>
                        <div class="product-card__detail">
                            <a href="?action=productdetail&id=<?= $product['product_id'] ?>">Xem chi tiết</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>Không có sản phẩm nào để hiển thị.</p>
            <?php endif; ?>
        </div>
    </div>
</main>
<?php require_once PATH_VIEW_CLIENT . 'default/footer.php' ?>