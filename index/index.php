<?php
/**
 * INDEX.PHP — TRANG CHỦ
 * ================================================
 * Đây là trang con. Nó CHỈ chứa nội dung riêng
 * của trang chủ. Header và footer được tách ra
 * riêng và "nhúng vào" bằng lệnh include.
 *
 * BƯỚC THỰC HIỆN:
 *   1. Khai báo biến $current_page = 'home'
 *      → header.php đọc biến này để tô sáng
 *        mục "Trang chủ" trong menu.
 *   2. include header.php (phần <head> + <nav>)
 *   3. Viết NỘI DUNG RIÊNG của trang này
 *   4. include footer.php (phần <footer> + <script>)
 * ================================================
 */

// BƯỚC 1: Khai báo biến cho header.php
$current_page = 'home';          // Tô sáng menu "Trang chủ"
$page_title   = 'Trang chủ';    // Hiện trong thẻ <title>
$base_path    = '';              // File nằm ở thư mục gốc => không cần tiền tố

// BƯỚC 2: Nhúng header (DOCTYPE, <head>, <nav>)
 include('../includes/header.php');;
?>

<!-- ================================================
     NỘI DUNG RIÊNG CỦA TRANG CHỦ BẮT ĐẦU TỪ ĐÂY
     ================================================ -->

<!-- ---- SECTION 1: HERO SLIDER ---- -->
<section class="hero-slider bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 animate__animated animate__fadeInLeft">
                <span class="badge bg-warning text-dark mb-3">🔥 Hơn 100+ khóa học mới cập nhật</span>
                <h1 class="display-4 fw-bold mb-4">
                    Phát triển kỹ năng,<br>
                    <span class="text-warning">Nâng tầm sự nghiệp</span>
                </h1>
                <p class="lead mb-4">
                    Học hỏi từ các chuyên gia hàng đầu. Khám phá hàng trăm khóa học
                    trực tuyến về lập trình, thiết kế, marketing và nhiều lĩnh vực khác.
                </p>
                <div class="d-flex gap-3">
                    <a href="courses.php" class="btn btn-warning btn-lg fw-bold">
                        <i class="fa-solid fa-rocket me-2"></i>Khám phá ngay
                    </a>
                    <a href="#" class="btn btn-outline-light btn-lg">
                        <i class="fa-solid fa-circle-play me-2"></i>Xem video giới thiệu
                    </a>
                </div>
                <!-- Thống kê nhanh -->
                <div class="row mt-5 text-center">
                    <div class="col-4">
                        <h3 class="fw-bold mb-0">500+</h3>
                        <small>Khóa học</small>
                    </div>
                    <div class="col-4">
                        <h3 class="fw-bold mb-0">50K+</h3>
                        <small>Học viên</small>
                    </div>
                    <div class="col-4">
                        <h3 class="fw-bold mb-0">200+</h3>
                        <small>Giảng viên</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block text-end">
                <img src="assets/img/hero-banner.png"
                     alt="Học trực tuyến"
                     class="img-fluid animate__animated animate__fadeInRight"
                     style="max-height: 420px;">
            </div>
        </div>
    </div>
</section>

<!-- ---- SECTION 2: DANH MỤC KHÓA HỌC ---- -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="fw-bold">Khám phá theo danh mục</h2>
            <p class="text-muted">Hàng trăm khóa học trong nhiều lĩnh vực khác nhau</p>
        </div>
        <div class="row g-3">
            <?php
            // Dữ liệu danh mục — thực tế sẽ lấy từ database
            $categories = [
                ['icon' => 'fa-code',          'name' => 'Lập Trình',     'count' => 120, 'color' => 'primary'],
                ['icon' => 'fa-palette',       'name' => 'Thiết Kế',      'count' => 85,  'color' => 'success'],
                ['icon' => 'fa-bullhorn',      'name' => 'Marketing',     'count' => 64,  'color' => 'warning'],
                ['icon' => 'fa-briefcase',     'name' => 'Kinh Doanh',    'count' => 73,  'color' => 'danger'],
                ['icon' => 'fa-language',      'name' => 'Ngoại Ngữ',     'count' => 95,  'color' => 'info'],
                ['icon' => 'fa-chart-bar',     'name' => 'Data Science',  'count' => 48,  'color' => 'secondary'],
            ];

            foreach ($categories as $index => $cat):
            ?>
            <div class="col-6 col-md-4 col-lg-2" data-aos="zoom-in" data-aos-delay="<?= $index * 80 ?>">
                <a href="courses.php?category=<?= urlencode($cat['name']) ?>"
                   class="card text-center border-0 shadow-sm h-100 text-decoration-none
                          hover-card p-3">
                    <div class="card-body">
                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center
                                    bg-<?= $cat['color'] ?> bg-opacity-10 mb-3"
                             style="width:60px; height:60px;">
                            <i class="fa-solid <?= $cat['icon'] ?> fs-4 text-<?= $cat['color'] ?>"></i>
                        </div>
                        <h6 class="fw-semibold text-dark mb-1"><?= $cat['name'] ?></h6>
                        <small class="text-muted"><?= $cat['count'] ?> khóa học</small>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ---- SECTION 3: KHÓA HỌC BÁN CHẠY (BEST SELLER) ---- -->
<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4" data-aos="fade-up">
            <div>
                <h2 class="fw-bold mb-1">🏆 Khóa học nổi bật</h2>
                <p class="text-muted mb-0">Được học viên đánh giá cao nhất</p>
            </div>
            <a href="courses.php" class="btn btn-outline-primary">
                Xem tất cả <i class="fa-solid fa-arrow-right ms-1"></i>
            </a>
        </div>

        <!-- Carousel dùng Slick Slider (kích hoạt bằng JS ở dưới) -->
        <div class="course-slider">
            <?php
            // Dữ liệu mẫu khóa học — thực tế lấy từ database
            $best_sellers = [
                ['id' => 1, 'title' => 'React.js từ cơ bản đến nâng cao',     'instructor' => 'Nguyễn Văn A', 'rating' => 4.9, 'students' => 12500, 'price' => 399000, 'original_price' => 799000],
                ['id' => 2, 'title' => 'Python & Machine Learning thực chiến', 'instructor' => 'Trần Thị B',   'rating' => 4.8, 'students' => 9800,  'price' => 499000, 'original_price' => 999000],
                ['id' => 3, 'title' => 'UI/UX Design với Figma',               'instructor' => 'Lê Văn C',     'rating' => 4.7, 'students' => 7200,  'price' => 299000, 'original_price' => 599000],
                ['id' => 4, 'title' => 'Digital Marketing toàn diện',          'instructor' => 'Phạm Thị D',   'rating' => 4.9, 'students' => 15000, 'price' => 349000, 'original_price' => 699000],
                ['id' => 5, 'title' => 'Node.js & Express API Development',    'instructor' => 'Hoàng Văn E',  'rating' => 4.8, 'students' => 6300,  'price' => 449000, 'original_price' => 899000],
            ];

            foreach ($best_sellers as $course):
            ?>
            <div class="px-2">
                <!-- CARD KHÓA HỌC -->
                <div class="card border-0 shadow-sm h-100 course-card">
                    <!-- Thumbnail -->
                    <div class="position-relative">
                        <img src="assets/img/course-thumb-<?= $course['id'] ?>.jpg"
                             class="card-img-top" alt="<?= htmlspecialchars($course['title']) ?>"
                             style="height: 180px; object-fit: cover;"
                             onerror="this.src='https://placehold.co/320x180/2563EB/FFFFFF?text=Khóa+Học'">
                        <span class="badge bg-danger position-absolute top-0 end-0 m-2">Best Seller</span>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title fw-semibold mb-2">
                            <?= htmlspecialchars($course['title']) ?>
                        </h6>
                        <p class="text-muted small mb-2">
                            <i class="fa-solid fa-user-tie me-1"></i>
                            <?= htmlspecialchars($course['instructor']) ?>
                        </p>
                        <!-- Rating -->
                        <div class="d-flex align-items-center gap-1 mb-2">
                            <span class="text-warning fw-bold"><?= $course['rating'] ?></span>
                            <div class="text-warning">
                                <?php for ($i = 0; $i < 5; $i++): ?>
                                    <i class="fa-solid fa-star<?= $i >= round($course['rating']) ? '-half-stroke' : '' ?> fa-xs"></i>
                                <?php endfor; ?>
                            </div>
                            <span class="text-muted small">(<?= number_format($course['students']) ?>)</span>
                        </div>
                        <!-- Giá -->
                        <div class="mt-auto">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="fw-bold text-primary fs-5">
                                        <?= number_format($course['price']) ?>đ
                                    </span>
                                    <del class="text-muted small ms-1">
                                        <?= number_format($course['original_price']) ?>đ
                                    </del>
                                </div>
                                <!-- Nút thêm vào giỏ hàng (dùng SweetAlert2) -->
                                <button class="btn btn-primary btn-sm"
                                        onclick="addToCart(<?= $course['id'] ?>, '<?= addslashes($course['title']) ?>')">
                                    <i class="fa-solid fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ================================================
     JS RIÊNG CỦA TRANG CHỦ
     Dùng biến $extra_scripts để inject vào footer.php
     ================================================ -->
<?php
$extra_scripts = <<<SCRIPTS
<script>
// Khởi tạo Slick Slider cho phần Best Seller
$(document).ready(function() {
    $('.course-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: true,
        dots: true,
        responsive: [
            { breakpoint: 1024, settings: { slidesToShow: 3 } },
            { breakpoint: 768,  settings: { slidesToShow: 2 } },
            { breakpoint: 480,  settings: { slidesToShow: 1 } }
        ]
    });
});

// Hàm thêm vào giỏ hàng với thông báo SweetAlert2
function addToCart(courseId, courseName) {
    Swal.fire({
        icon: 'success',
        title: 'Đã thêm vào giỏ hàng!',
        text: courseName,
        showConfirmButton: true,
        confirmButtonText: 'Xem giỏ hàng',
        showCancelButton: true,
        cancelButtonText: 'Tiếp tục mua',
        confirmButtonColor: '#2563EB',
        timer: 4000,
        timerProgressBar: true,
    }).then(function(result) {
        if (result.isConfirmed) {
            window.location.href = 'cart.php';
        }
    });
}
</script>
SCRIPTS;
?>

<!-- BƯỚC 4: Nhúng footer (<footer> + tất cả <script>) -->
<?php include('../includes/footer.php'); ?>
