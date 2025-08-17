<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark position-static" style="width: 280px; min-height: 100vh;">
    <a href="<?= BASE_URL_ADMIN ?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-4">Admin Panel</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="<?= BASE_URL_ADMIN ?>" class="nav-link text-white" aria-current="page">
                Dashboard
            </a>
        </li>
        <li>
            <a href="<?= BASE_URL_ADMIN ?>&action=users" class="nav-link text-white">Quản lý Users</a>
        </li>
        <li>
            <a href="<?= BASE_URL_ADMIN ?>&action=products" class="nav-link text-white">Quản lý Products</a>
        </li>
        <li>
            <a href="<?= BASE_URL_ADMIN ?>&action=categories" class="nav-link text-white">Quản lý Categories</a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="<?= BASE_URL_ADMIN ?>&action=logout" class="d-flex align-items-center text-white text-decoration-none" onclick="return confirm('Bạn có chắc chắn muốn đăng xuất?')">
            <strong>Đăng xuất</strong>
        </a>
    </div>
</div>