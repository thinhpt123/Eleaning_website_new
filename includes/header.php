<?php
/**
 * INCLUDES/HEADER.PHP
 * ================================================
 * Phần đầu chung của tất cả các trang.
 * Chứa: DOCTYPE, <head> (CSS, fonts), và thanh <nav>.
 *
 * CÁCH DÙNG:
 *   Ở đầu mỗi trang con, khai báo biến $current_page
 *   rồi gọi: include 'includes/header.php';
 *
 * LOGIC MENU ACTIVE:
 *   File này đọc biến $current_page được khai báo ở
 *   trang con, rồi tự động thêm class "active" vào
 *   đúng thẻ <a> tương ứng trong navbar.
 * ================================================
 */

// -----------------------------------------------
// BƯỚC 1: Xác định trang hiện tại.
// $current_page được khai báo ở mỗi trang con.
// Nếu không khai báo, mặc định là 'home'.
// -----------------------------------------------
if (!isset($current_page)) {
    $current_page = 'home';
}

// -----------------------------------------------
// BƯỚC 2: Hàm trợ giúp trả về class "active"
// nếu $page khớp với $current_page.
// -----------------------------------------------
function nav_active(string $page, string $current): string {
    return $page === $current ? 'active' : '';
}

// -----------------------------------------------
// BƯỚC 3: Xác định $base_path (đường dẫn gốc).
// Cần thiết để CSS/JS/hình ảnh vẫn đúng khi file
// được đặt ở thư mục con (vd: /admin/, /user/).
// Nếu trang nằm ở thư mục gốc  => $base_path = ''
// Nếu trang nằm trong /admin/  => $base_path = '../'
// -----------------------------------------------
if (!isset($base_path)) {
    $base_path = ''; // Mặc định: trang ở thư mục gốc
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tiêu đề trang — $page_title được đặt ở trang con -->
    <title><?= isset($page_title) ? htmlspecialchars($page_title) . ' | EduLearn' : 'EduLearn - Học Trực Tuyến' ?></title>

    <!-- ==========================================
         CSS: Dùng $base_path để đường dẫn luôn đúng
         dù file nằm ở thư mục gốc hay thư mục con.
         ========================================== -->

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- Font Awesome (icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Animate.css (hiệu ứng) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- AOS - Animate On Scroll -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <!-- CSS riêng của dự án — dùng $base_path -->
    <link rel="stylesheet" href="<?= $base_path ?>assets/css/style.css">
</head>
<body>

<!-- ================================================
     THANH ĐIỀU HƯỚNG (NAVBAR) — DÙNG CHUNG MỌI TRANG
     ================================================ -->
<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand fw-bold text-primary fs-4" href="<?= $base_path ?>index.php">
            <i class="fa-solid fa-book-open-reader me-2"></i>EduLearn
        </a>

        <!-- Nút hamburger cho mobile -->
        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarMain">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMain">

            <!-- Thanh tìm kiếm nổi bật -->
            <form class="d-flex mx-auto my-2 my-lg-0" style="width: 360px;">
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0">
                        <i class="fa-solid fa-magnifying-glass text-muted"></i>
                    </span>
                    <input class="form-control bg-light border-start-0"
                           type="search" placeholder="Tìm kiếm khóa học...">
                </div>
            </form>

            <!-- ==========================================
                 CÁC LIÊN KẾT MENU
                 Hàm nav_active() tự động thêm class "active"
                 vào đúng mục đang được xem.
                 ========================================== -->
            <ul class="navbar-nav me-auto ms-3">
                <li class="nav-item">
                    <a class="nav-link <?= nav_active('home', $current_page) ?>"
                       href="<?= $base_path ?>index.php">
                        Trang chủ
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= nav_active('courses', $current_page) ?>"
                       href="<?= $base_path ?>courses.php">
                        Khóa học
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= nav_active('about', $current_page) ?>"
                       href="<?= $base_path ?>about.php">
                        Về chúng tôi
                    </a>
                </li>
            </ul>

            <!-- Nút đăng nhập / đăng ký -->
            <div class="d-flex gap-2">
                <!-- Icon giỏ hàng -->
                <a href="<?= $base_path ?>cart.php"
                   class="btn btn-outline-secondary position-relative">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        3
                    </span>
                </a>
                <a href="<?= $base_path ?>login.php"
                   class="btn btn-outline-primary">Đăng nhập</a>
                <a href="<?= $base_path ?>register.php"
                   class="btn btn-primary">Đăng ký</a>
            </div>

        </div>
    </div>
</nav>

<!-- Khoảng trống bù cho navbar cố định (fixed-top) -->
<div style="margin-top: 72px;"></div>
