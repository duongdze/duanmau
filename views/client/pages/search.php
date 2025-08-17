<?php require_once PATH_VIEW_CLIENT . 'default/header.php' ?>
<main class="bestsell">
    <div class="bestsell__main--container">
        <div class="main__container--header text-center mb-4">
            <h1>Kết quả tìm kiếm cho "<?= htmlspecialchars($keyword ?? '') ?>"</h1>
            <div class="header--breadcrumb">
                <a href="<?= BASE_URL ?>">Home</a> / Tìm kiếm
            </div>
        </div>
        <?php if (!empty($products)) : ?>
            <div class="product-grid">
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
                            <div class="card__price--new">
                                <?= number_format($product['price'], 0, ',', '.') ?><u>đ</u>
                            </div>
                        </div>
                        <div class="product-card__detail">
                            <a href="?action=productdetail&id=<?= $product['product_id'] ?>">Xem chi tiết</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <div class="alert alert-info text-center" role="alert">
                <p class="mb-2">Không tìm thấy sản phẩm nào phù hợp với từ khóa "<strong><?= htmlspecialchars($keyword ?? '') ?></strong>".</p>
                <a href="<?= BASE_URL ?>" class="alert-link">Quay lại trang chủ và thử lại.</a>
            </div>
        <?php endif; ?>
    </div>
</main>
<?php require_once PATH_VIEW_CLIENT . 'default/footer.php' ?>