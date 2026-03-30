<?php
$current_page = 'courses';
$page_title   = 'Khóa học';
$base_path    = '';

// Kết nối DB
include("../database/ketnoi.php");

// Header
include("../includes/header.php");
?>

<!-- Load CSS riêng -->
<link rel="stylesheet" href="../assets/css/course.css">

<!-- ===== HERO ===== -->
<section class="py-5 hero-course text-white text-center position-relative">
    <div class="container position-relative z-index-1">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="fw-bold display-4 mb-4 animate__animated animate__fadeInDown">
                    <i class="fa-solid fa-graduation-cap me-3"></i>
                    Khám phá <span class="text-warning">500+</span> khóa học
                </h1>
                <p class="lead mb-4 animate__animated animate__fadeInUp">
                    Nâng cao kỹ năng với những khóa học chất lượng cao từ các chuyên gia hàng đầu
                </p>
                <div class="animate__animated animate__zoomIn">
                    <a href="#courses" class="btn btn-warning btn-lg fw-bold px-5 py-3 me-3 btn-glow">
                        <i class="fa-solid fa-magnifying-glass me-2"></i>Xem tất cả
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== STATS GRID ===== -->
<section class="py-5 stats-grid">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-md-3 col-sm-6">
                <div class="stat-item">
                    <div class="stat-number">500+</div>
                    <h5 class="fw-bold text-primary">Khóa học</h5>
                    <p class="text-muted">Đa dạng lĩnh vực</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-item">
                    <div class="stat-number">50K+</div>
                    <h5 class="fw-bold text-success">Học viên</h5>
                    <p class="text-muted">Đã tham gia</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-item">
                    <div class="stat-number">4.8</div>
                    <h5 class="fw-bold text-warning">★ Đánh giá</h5>
                    <p class="text-muted">Trung bình</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-item">
                    <div class="stat-number">24/7</div>
                    <h5 class="fw-bold text-info">Hỗ trợ</h5>
                    <p class="text-muted">Liên tục</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== FILTER & SEARCH ===== -->
<section class="py-4 bg-light">
    <div class="container">
        <div class="course-filter mb-4">
            <div class="row align-items-center g-3">
                <div class="col-lg-4">
                    <div class="filter-tabs nav nav-pills">
                        <a href="#" class="filter-tab nav-link active px-4 py-2" data-filter="all">
                            Tất cả
                        </a>
                        <a href="#" class="filter-tab nav-link px-4 py-2" data-filter="programming">
                            Lập trình
                        </a>
                        <a href="#" class="filter-tab nav-link px-4 py-2" data-filter="design">
                            Thiết kế
                        </a>

                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="fa-solid fa-search text-muted"></i>
                        </span>
                        <input type="text" id="courseSearch" class="form-control search-input border-start-0 ps-0"
                            placeholder="Tìm kiếm khóa học..." autocomplete="off">
                    </div>
                </div>
                <div class="col-lg-3 text-lg-end">
                    <span class="text-muted small me-3">Sắp xếp:</span>
                    <select class="form-select form-select-sm" style="width: auto; display: inline-block;">
                        <option>Mới nhất</option>
                        <option>Giá thấp</option>
                        <option>Giá cao</option>
                        <option>Đánh giá cao</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== DANH SÁCH KHÓA HỌC ===== -->
<section class="py-5" id="courses">
    <div class="container">
        <div class="row g-4" id="courseGrid">
            <?php
            // Hiển thị skeleton loading trước
            for ($i = 0; $i < 3; $i++):
            ?>
                <div class="col-lg-4 col-md-6">
                    <div class="course-card skeleton">
                        <div class="skeleton-image"></div>
                        <div class="p-4">
                            <div class="skeleton-text" style="width: 80%;"></div>
                            <div class="skeleton-text" style="width: 60%;"></div>
                            <div class="skeleton-text" style="width: 40%; height: 1.2rem;"></div>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>

            <?php
            // Lấy dữ liệu thật
            $sql = "SELECT * FROM course ORDER BY id DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0):
                while ($row = $result->fetch_assoc()):
            ?>
                    <div class="col-lg-4 col-md-6">
                        <a href="course_detail.php?id=<?= $row['id'] ?>" class="text-decoration-none" style="cursor: pointer;">
                            <div class="course-card position-relative overflow-hidden" data-category="<?= strtolower($row['category'] ?? 'all') ?>">
                                <!-- Ảnh -->
                                <div class="position-relative overflow-hidden">
                                    <img src="../assets/img/<?= htmlspecialchars($row['image']) ?>"
                                        class="course-image w-100"
                                        alt="<?= htmlspecialchars($row['title']) ?>"
                                        loading="lazy"
                                        onerror="this.src='https://placehold.co/400x220/667eea/ffffff?text=<?= urlencode(substr($row['title'], 0, 1)) ?>'">

                                    <span class="course-badge">
                                        <i class="fa-solid fa-bolt me-1"></i>
                                        <?= htmlspecialchars($row['category'] ?? 'Cơ bản') ?>
                                    </span>
                                </div>

                                <div class="card-body p-4">
                                    <!-- Tên -->
                                    <h5 class="fw-bold course-title mb-2">
                                        <?= htmlspecialchars($row['title']) ?>
                                    </h5>

                                    <!-- Rating -->
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="course-rating me-2">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                        <span class="text-muted small">(<?= rand(150, 500) ?>)</span>
                                    </div>

                                    <!-- Mô tả -->
                                    <p class="text-muted small course-desc mb-4">
                                        <?= htmlspecialchars(substr($row['description'], 0, 120)) ?>...
                                    </p>

                                    <!-- Giá & Buttons -->
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div>
                                            <div class="course-price h5 fw-bold mb-0">
                                                <?= number_format($row['price']) ?>đ
                                            </div>
                                            <small class="text-muted text-decoration-line-through">
                                                <?= number_format($row['price'] * 1.3) ?>đ
                                            </small>
                                        </div>
                                    </div>

                                    <!-- Action Bar (chỉ nút giỏ hàng) -->
                                    <div class="position-absolute bottom-0 end-0 p-3" style="right: -10px; bottom: -10px;">
                                        <a href="giohang.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-cart-pulse shadow-lg rounded-circle"
                                            title="Thêm vào giỏ" style="width: 55px; height: 55px; display: flex; align-items: center; justify-content: center;">
                                            <i class="fa-solid fa-cart-plus fa-lg"></i>
                                        </a>
                                    </div>
                                </div>


                            </div>
                        </a>
                    </div>
                <?php endwhile;
            else: ?>
                <div class="col-12 text-center py-5">
                    <i class="fa-solid fa-magnifying-glass fa-3x text-muted mb-4"></i>
                    <h4 class="text-muted">Chưa có khóa học nào</h4>
                    <p class="text-muted">Chúng tôi sẽ sớm cập nhật các khóa học mới!</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Pagination (nếu có nhiều trang) -->
        <div class="row mt-5">
            <div class="col-12 text-center">
                <nav aria-label="Course pagination">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">
                                <i class="fa-solid fa-chevron-left"></i>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="fa-solid fa-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- ===== CTA SECTION ===== -->
<section class="py-5 bg-gradient text-white text-center position-relative overflow-hidden">
    <div class="position-absolute top-0 left-0 w-100 h-100" style="background: var(--secondary-gradient); opacity: 0.9;"></div>
    <div class="container position-relative z-index-1">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <i class="fa-solid fa-rocket fa-3x mb-4 opacity-75"></i>
                <h2 class="fw-bold display-4 mb-4">Sẵn sàng bắt đầu học?</h2>
                <p class="lead mb-5">Chọn khóa học phù hợp và bắt đầu hành trình phát triển sự nghiệp ngay hôm nay</p>
                <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                    <a href="#courses" class="btn btn-warning btn-lg fw-bold px-5 py-3 btn-glow">
                        <i class="fa-solid fa-play-circle me-2"></i>Bắt đầu học
                    </a>
                    <a href="contact.php" class="btn btn-outline-light btn-lg fw-bold px-5 py-3">
                        <i class="fa-solid fa-headset me-2"></i>Tư vấn miễn phí
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Load JS riêng (defer để tối ưu tốc độ) -->
<script defer src="../assets/js/course.js"></script>

<?php
// Đóng kết nối DB
$conn->close();
include("../includes/footer.php");
?>