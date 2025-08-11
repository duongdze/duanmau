<?php require_once PATH_VIEW_CLIENT . 'default/header.php' ?>
<main class="news">
    <div class="news__main--container">
        <div class="main__container--header">
            <h1>Tin tức &amp; Ưu đãi</h1>
            <div class="header--breadcrumb">
                <a href="<?= BASE_URL ?>">Home</a> / Tin tức
            </div>
        </div>
        <a href="?action=newsdetail">
        <article class="news__article news__featured">
            <div class="featured__badge">🔥 Nổi bật</div>
            <div class="article__image article__image--placeholder">
                <div class="article__category category--review">Review</div> 
                <img src="<?=BASE_ASSETS_CLIENT?>image/racing.png" alt="">
            </div>
            <div class="article__content">
                <h2 class="article__title">Đỉ sần của Tinker: Bộ sưu tập Air Max 90 "Racing" tri ân tốc độ</h2>
                <p class="article__excerpt">Khám phá bộ sưu tập Air Max 90 Racing đặc biệt được thiết kế bởi Tinker Hatfield, tôn vinh tinh thần tốc độ và đam mê thể thao...</p>
                <div class="article__meta">
                    <span class="meta__date">2 giờ trước</span>
                    <span class="meta__views">1,234 lượt xem</span>
                </div>
            </div>
        </article>
        </a>

        <article class="news__article">
            <div class="article__image article__image--gray">
                <div class="article__category category--guide">Hướng dẫn</div> 
                <img src="<?=BASE_ASSETS_CLIENT?>image/adidas-superstar-feeback_0008_IMG_9862.jpg.avif" alt="Giày Adidas Superstar">
            </div>
            <div class="article__content">
                <h2 class="article__title">Air Max 95 chuyển mình sang đông SB: Khác biệt thực sự là gì?</h2>
                <p class="article__excerpt">Tìm hiểu sự khác biệt giữa phiên bản Air Max 95 thường và phiên bản SB dành cho skateboard, từ thiết kế đến chất liệu...</p>
                <div class="article__meta">
                    <span class="meta__date">5 giờ trước</span>
                    <span class="meta__views">856 lượt xem</span>
                </div>
            </div>
        </article>

        <article class="news__article">
            <div class="article__image article__image--green">
                <div class="article__category category--news">Tin tức</div> 
                <img src="<?=BASE_ASSETS_CLIENT?>image/adidas-superstar-feeback_0007_IMG_9885.jpg.avif" alt="Giày Adidas trên kệ">
            </div>
            <div class="article__content">
                <h2 class="article__title">Air Max 95 chuyển mình sang đông SB: Khác biệt thực sự là gì?</h2>
                <p class="article__excerpt">Phân tích chi tiết về công nghệ và thiết kế mới của dòng Air Max 95 SB, đặc biệt phù hợp cho việc trượt ván...</p>
                <div class="article__meta">
                    <span class="meta__date">1 ngày trước</span>
                    <span class="meta__views">2,341 lượt xem</span>
                </div>
            </div>
        </article>

        <article class="news__article">
            <div class="article__image article__image--blue">
                <div class="article__category category--review">Review</div> 
                <img src="<?=BASE_ASSETS_CLIENT?>image/adidas-superstar-feeback_0006_IMG_9873.jpg.avif" alt="Chi tiết giày Adidas">
            </div>
            <div class="article__content">
                <h2 class="article__title">ASICS GEL-QUANTUM™ 360: Hành trình 10 năm định hình lại phong cách thể thao và đường phố</h2>
                <p class="article__excerpt">Nhìn lại 10 năm phát triển của dòng ASICS GEL-QUANTUM 360, từ công nghệ đột phá đến ảnh hưởng trong thế giới streetwear...</p>
                <div class="article__meta">
                    <span class="meta__date">2 ngày trước</span>
                    <span class="meta__views">3,127 lượt xem</span>
                </div>
            </div>
        </article>

        <article class="news__article">
            <div class="article__image article__image--purple">
                <div class="article__category category--top-10">Top 10</div> 
                <img src="<?=BASE_ASSETS_CLIENT?>image/IMG_1015-430x430.jpg.avif" alt="Giày Vans Vault">
            </div>
            <div class="article__content">
                <h2 class="article__title">10 bản Nike SB mashup đình nhất đã từng gây bão trong cộng đồng sneakerhead</h2>
                <p class="article__excerpt">Khám phá những thiết kế mashup độc đáo nhất của Nike SB từ trước đến nay, từ những collaboration đình đám đến concept fan-made viral...</p>
                <div class="article__meta">
                    <span class="meta__date">3 ngày trước</span>
                    <span class="meta__views">4,892 lượt xem</span>
                </div>
            </div>
        </article>

        <div class="loading__indicator">
            <div class="loading__spinner"></div>
            <p>Đang tải thêm tin tức...</p>
        </div>
    </div>
</main>
<?php require_once PATH_VIEW_CLIENT . 'default/footer.php' ?>