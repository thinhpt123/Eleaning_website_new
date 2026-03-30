<?php
/**
 * INCLUDES/SIDEBAR_ADMIN.PHP
 * ================================================
 * Thanh sidebar dùng chung cho tất cả trang Admin.
 * Tương tự header.php nhưng chỉ dành cho /admin/.
 *
 * Cách dùng: include '../includes/sidebar_admin.php';
 * ($base_path phải được khai báo ở trang admin gọi nó)
 * ================================================
 */

// $admin_page được khai báo ở mỗi trang admin
if (!isset($admin_page)) $admin_page = 'dashboard';

function admin_active(string $page, string $current): string {
    return $page === $current ? 'active bg-primary text-white' : 'text-muted';
}
?>
<div class="d-flex flex-column p-3 bg-dark text-white"
     style="width: 260px; min-height: 100vh; position: fixed; left:0; top:0;">

    <!-- Logo Admin -->
    <a href="<?= $base_path ?>admin/dashboard.php"
       class="d-flex align-items-center mb-4 text-white text-decoration-none">
        <i class="fa-solid fa-gear fs-4 me-2 text-primary"></i>
        <span class="fs-5 fw-bold">AdminPanel</span>
    </a>

    <hr class="border-secondary">

    <!-- Menu -->
    <ul class="nav nav-pills flex-column gap-1">
    <li class="nav-item mb-2">
        <a href="dashboard.php"
           class="nav-link rounded py-2 <?= ($admin_page == 'dashboard') ? 'bg-primary text-white' : 'text-primary' ?>">
            <i class="fa-solid fa-chart-pie me-2"></i> Dashboard
        </a>
    </li>

    <li class="nav-item mb-2">
        <a href="upSP.php"
           class="nav-link rounded py-2 <?= ($admin_page == 'upSP') ? 'bg-info text-white' : 'text-info' ?>">
            <i class="fa-solid fa-cloud-arrow-up me-2"></i> Đăng tải sản phẩm
        </a>
    </li>

    <li class="nav-item mb-2">
        <a href="xulydonhang.php"
           class="nav-link rounded py-2 <?= ($admin_page == 'orders') ? 'bg-success text-white' : 'text-success' ?>">
            <i class="fa-solid fa-cart-shopping me-2"></i> Xử lý đơn hàng
        </a>
    </li>
    </ul>

    <!-- Thông tin Admin ở dưới cùng sidebar -->
    <div class="mt-auto pt-3 border-top border-secondary">
        <div class="d-flex align-items-center gap-2">
            <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center"
                 style="width:36px;height:36px;">
                <span class="fw-bold small">AD</span>
            </div>
            <div>
                <div class="small fw-semibold">Admin User</div>
                <div class="text-muted" style="font-size:.75rem;">admin@edulearn.vn</div>
            </div>
        </div>
        <a href="<?= $base_path ?>logout.php"
           class="btn btn-outline-danger btn-sm w-100 mt-2">
            <i class="fa-solid fa-right-from-bracket me-1"></i>Đăng xuất
        </a>
    </div>
</div>
