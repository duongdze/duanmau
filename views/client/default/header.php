<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="<?= BASE_ASSETS_CLIENT ?>css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

</head>

<body>
    <div class="header">
        <div class="header__container xs">
            <div class="header__container--logo col-2">
                <a href="<?= BASE_URL ?>">LOGO</a>
            </div>
            <div class="header__container--menu ">
                <div class="container__menu--list">
                    <div class="dropdown">
                        <button class="btn btn-category " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-bars me-2"></i> Danh mục
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?action=bestsell">Sản phẩm bán chạy</a></li>
                            <li><a class="dropdown-item" href="?action=news">Tin tức</a></li>
                            <li><a class="dropdown-item" href="?action=contact">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="header__container--search">
                <form action="<?= BASE_URL ?>" method="GET" class="search-form">
                    <input type="hidden" name="action" value="search">
                    <input type="text" name="keyword" class="search__input" placeholder="Tìm kiếm theo tên hoặc giá..." value="<?= htmlspecialchars($_GET['keyword'] ?? '') ?>" required>
                    <button type="submit" class="search__button" aria-label="Tìm kiếm">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>
            <div class="header__container--user">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" title="Tài khoản">
                        <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 16 16">
                            <path fill="#FFFFFE" d="M11 7c0 1.66-1.34 3-3 3S5 8.66 5 7s1.34-3 3-3s3 1.34 3 3" />
                            <path fill="#FFFFFE" fill-rule="evenodd" d="M16 8c0 4.42-3.58 8-8 8s-8-3.58-8-8s3.58-8 8-8s8 3.58 8 8M4 13.75C4.16 13.484 5.71 11 7.99 11c2.27 0 3.83 2.49 3.99 2.75A6.98 6.98 0 0 0 14.99 8c0-3.87-3.13-7-7-7s-7 3.13-7 7c0 2.38 1.19 4.49 3.01 5.75" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <?php if (isset($_SESSION['user'])) : ?>
                            <li><span class="dropdown-item-text">Chào, <strong><?= htmlspecialchars($_SESSION['user']['full_name']) ?></strong></span></li>
                            <li><a class="dropdown-item" href="?action=profile">Hồ sơ của tôi</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="?action=logout">Đăng xuất</a></li>
                        <?php else : ?>
                            <li><a class="dropdown-item" href="?action=login">Đăng nhập</a></li>
                            <li><a class="dropdown-item" href="?action=register">Đăng ký</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="container__user--cart dropdown">
                    <a href="#" class="dropdown-toggle cart-icon-wrapper" data-bs-toggle="dropdown" aria-expanded="false" title="Giỏ hàng & Đơn hàng">
                        <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 24 24">
                            <path fill="#FFFFFE" d="M19 7h-3V6a4 4 0 0 0-8 0v1H5a1 1 0 0 0-1 1v11a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V8a1 1 0 0 0-1-1m-9-1a2 2 0 0 1 4 0v1h-4Zm8 13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V9h2v1a1 1 0 0 0 2 0V9h4v1a1 1 0 0 0 2 0V9h2Z" />
                        </svg>
                        <?php
                        // Chỉ hiển thị số lượng nếu người dùng đã đăng nhập và giỏ hàng không rỗng
                        if (isset($_SESSION['user']['cart']) && !empty($_SESSION['user']['cart'])) {
                            $cartItemCount = count($_SESSION['user']['cart']);
                            echo "<span class=\"cart-count-badge\">{$cartItemCount}</span>";
                        }
                        ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="?action=cart">Xem giỏ hàng</a></li>
                        <li><a class="dropdown-item" href="?action=order-history">Lịch sử đơn hàng</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>