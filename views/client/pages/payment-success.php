<?php require_once PATH_VIEW_CLIENT . 'default/header.php'; ?>

<main class="payment-success" style="min-height: 60vh; display: flex; align-items: center;">
    <div class="container text-center py-5">
        <div class="success-icon mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="#28a745" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </svg>
        </div>
        <h1 class="display-4">Đặt hàng thành công!</h1>
        <p class="lead">Cảm ơn bạn đã mua hàng tại cửa hàng của chúng tôi.</p>
        <p>Chúng tôi sẽ xử lý đơn hàng của bạn trong thời gian sớm nhất.</p>
        <hr class="my-4">
        <p>Bạn muốn làm gì tiếp theo?</p>
        <a class="btn btn-primary btn-lg" href="<?= BASE_URL ?>" role="button">Tiếp tục mua sắm</a>
        <a class="btn btn-outline-secondary btn-lg" href="?action=order-history" role="button">Xem lịch sử đơn hàng</a>
    </div>
</main>

<?php require_once PATH_VIEW_CLIENT . 'default/footer.php'; ?>