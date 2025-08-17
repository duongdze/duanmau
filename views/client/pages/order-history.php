<?php require_once PATH_VIEW_CLIENT . 'default/header.php'; ?>

<main class="order-history">
    <div class="container ">
        <div class="main__container--header text-center mb-5">
            <h1>Lịch sử đơn hàng</h1>
            <p>Theo dõi tất cả các đơn hàng đã đặt của bạn</p>
        </div>

        <?php if (empty($orders)) : ?>
            <div class="alert alert-info text-center" role="alert">
                Bạn chưa có đơn hàng nào. <a href="<?= BASE_URL ?>" class="alert-link">Bắt đầu mua sắm ngay!</a>
            </div>
        <?php else : ?>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th scope="col">Mã ĐH</th>
                            <th scope="col">Ngày đặt</th>
                            <th scope="col">Địa chỉ giao hàng</th>
                            <th scope="col">Tổng tiền</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order) : ?>
                            <tr>
                                <th scope="row">#<?= htmlspecialchars($order['order_id']) ?></th>
                                <td><?= date('d/m/Y H:i', strtotime($order['order_date'])) ?></td>
                                <td><?= htmlspecialchars($order['shipping_address']) ?></td>
                                <td><strong><?= number_format($order['total_amount'], 0, ',', '.') ?>đ</strong></td>
                                <td>
                                    <span class="badge status-<?= htmlspecialchars($order['status']) ?>">
                                        <?= htmlspecialchars(ucfirst($order['status'])) ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="?action=order-detail&id=<?= $order['order_id'] ?>" class="btn btn-sm btn-view-detail">Xem</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php require_once PATH_VIEW_CLIENT . 'default/footer.php'; ?>