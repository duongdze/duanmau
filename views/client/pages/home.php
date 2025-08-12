<?php require_once PATH_VIEW_CLIENT . 'default/header.php' ?>
<main class="home">
    <div class="home__main--container">
        <div class="main__container--bannner">
            <img src="<?= BASE_ASSETS_CLIENT ?>image/slider-bnanner-44080.png" alt="Banner quảng cáo">
        </div>
        <div class="main__container--content">
            <div class="container__content--bestsell">
                <div class="content__bestsell--title">
                    <div class="bestsell__title--secssion content__title ">
                        Top sản phẩm bán chạy
                    </div>
                    <div class="bestsell__title--button content__button">
                        <button>Xem tất cả</button>
                    </div>
                </div>
                <div class="content__bestsell--products">
                    <?php if (!empty($topSellingProducts)) : ?>
                        <?php foreach ($topSellingProducts as $product) : ?>
                            <div class="bestsell__product">
                                <div class="product__image">
                                    <a href="?action=productdetail&id=<?= $product['product_id'] ?>">
                                        <img src="<?= BASE_ASSETS_UPLOADS ?><?= htmlspecialchars($product['image_url']) ?>" alt="<?= htmlspecialchars($product['product_name']) ?>">
                                    </a>
                                </div>
                                <div class="product__bestsell">
                                    <p>Bán chạy</p>
                                </div>
                                <div class="product__title">
                                    <?= htmlspecialchars($product['product_name']) ?>
                                </div>
                                <div class="prodcut__detail">
                                    <a href="?action=productdetail&id=<?= $product['product_id'] ?>">Xem chi tiết</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>Chưa có sản phẩm bán chạy nào để hiển thị.</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="container__content--news">
                <div class="content__news--title">
                    <div class="news__title--secssion content__title">
                        Tin tức & ưu đãi
                    </div>
                    <div class="news__title--button content__button">
                        <button>Xem tất cả</button>
                    </div>
                </div>
                <div class="content__news--products">
                    <div class="news__product">
                        <div class="product__image">
                            <img src="<?= BASE_ASSETS_CLIENT ?>image/racing.png" alt="">
                        </div>
                        <div class="product__news">
                            <p>Khuyến mãi</p>
                        </div>
                        <div class="product__title">
                            DI sản của Tinker
                        </div>
                        <div class="prodcut__detail">
                            <a href="?action=newsdetail">Xem chi tiết</a>
                        </div>
                    </div>
                    <div class="news__product">
                        <div class="product__image">
                            <img src="<?= BASE_ASSETS_CLIENT ?>image/racing.png" alt="">
                        </div>
                        <div class="product__news">
                            <p>Khuyến mãi</p>
                        </div>
                        <div class="product__title">
                            DI sản của Tinker
                        </div>
                        <div class="prodcut__detail">
                            <a href="#">Xem chi tiết</a>
                        </div>
                    </div>
                    <div class="news__product">
                        <div class="product__image">
                            <img src="<?= BASE_ASSETS_CLIENT ?>image/racing.png" alt="">
                        </div>
                        <div class="product__news">
                            <p>Khuyến mãi</p>
                        </div>
                        <div class="product__title">
                            DI sản của Tinker
                        </div>
                        <div class="prodcut__detail">
                            <a href="#">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once PATH_VIEW_CLIENT . 'default/footer.php' ?>