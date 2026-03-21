<?php
/**
 * ABOUT.PHP — TRANG GIỚI THIỆU
 * ================================================
 * Chỉ cần 4 bước:
 *   1. Khai báo $current_page = 'about'
 *      → Menu "Về chúng tôi" sẽ tự sáng màu (active)
 *   2. include header.php
 *   3. Viết nội dung riêng
 *   4. include footer.php
 * ================================================
 */

// BƯỚC 1: Biến cấu hình cho header
$current_page = 'about';          // ← Khác với index.php (= 'home')
$page_title   = 'Về Chúng Tôi';
$base_path    = '';               // Vẫn ở thư mục gốc

// BƯỚC 2: Nhúng header
include '../includes/header.php';
?>

<!-- Nội dung riêng trang About bắt đầu từ đây -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h1 class="fw-bold">Về EduLearn</h1>
            <p class="text-muted lead">
                Sứ mệnh của chúng tôi là democratize (dân chủ hoá) giáo dục
                chất lượng cao cho tất cả mọi người tại Việt Nam.
            </p>
        </div>
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <h2 class="fw-bold mb-3">Câu chuyện của chúng tôi</h2>
                <p>Thành lập năm 2020, EduLearn bắt đầu với chỉ 10 khóa học...</p>
                <!-- ... nội dung trang about tiếp theo ... -->
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <img src="assets/img/about-team.jpg" alt="Đội ngũ" class="img-fluid rounded-4 shadow">
            </div>
        </div>
    </div>
</section>

<!-- BƯỚC 4: Nhúng footer -->
<?php include '../includes/footer.php'; ?>
