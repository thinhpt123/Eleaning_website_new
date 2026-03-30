<?php
$current_page = 'courses';
$page_title   = 'Chi tiết khóa học';
$base_path    = '../';

include("../database/ketnoi.php");
include("../includes/header.php");

// Lấy id an toàn
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Query
$sql = "SELECT * FROM course WHERE id = $id";
$result = $conn->query($sql);

if (!$result || $result->num_rows == 0) {
    echo "<div class='container mt-5'><div class='alert alert-warning text-center'><h4><i class='fa-solid fa-exclamation-triangle me-2'></i>Không tìm thấy khóa học</h4><p>Khóa học bạn tìm có thể đã bị xóa hoặc ID không hợp lệ.</p><a href='course.php' class='btn btn-primary'>← Quay lại danh sách khóa học</a></div></div>";
    include("../includes/footer.php");
    exit();
}

$row = $result->fetch_assoc();
?>

<!-- Load CSS riêng -->
<link rel="stylesheet" href="../assets/css/course_detail.css">

<!-- ===== HERO DETAIL ===== -->
<section class="py-5 hero-detail text-white position-relative">
    <div class="container position-relative z-index-1">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <nav aria-label="breadcrumb" class="d-none d-md-block">
                    <ol class="breadcrumb bg-transparent p-0 mb-3">
                        <li class="breadcrumb-item"><a href="course.php" class="text-white-50">Khóa học</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page"><?= htmlspecialchars($row['title']) ?></li>
                    </ol>
                </nav>
                <h1 class="fw-bold display-4 mb-3 animate__animated animate__fadeInDown">
                    <?= htmlspecialchars($row['title']) ?>
                </h1>
                <p class="lead mb-4 animate__animated animate__fadeInUp">
                    <?= htmlspecialchars(substr($row['description'], 0, 160)) ?>...
                </p>
                <div class="d-flex flex-wrap gap-3 animate__animated animate__zoomIn">
                    <span class="badge bg-light text-dark px-3 py-2 fs-6">
                        <i class="fa-solid fa-bookmark me-1"></i><?= htmlspecialchars($row['category'] ?? 'Chưa phân loại') ?>
                    </span>
                    <span class="badge bg-success px-3 py-2 fs-6">
                        <i class="fa-solid fa-clock me-1"></i><?= htmlspecialchars($row['duration'] ?? 'Không xác định') ?>
                    </span>
                    <span class="badge bg-warning text-dark px-3 py-2 fs-6">
                        <i class="fa-solid fa-star me-1"></i>4.8 (2,456)
                    </span>
                </div>
            </div>
            <div class="col-lg-4 text-lg-end text-center">
                <div class="price-badge mx-auto mx-lg-0 d-inline-block">
                    <?= number_format($row['price']) ?>đ
                    <small class="d-block fs-6 opacity-75">Giá gốc: <s><?= number_format($row['price'] * 1.3) ?>đ</s></small>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== MAIN CONTENT ===== -->
<section class="py-5">
    <div class="container">
        <div class="row g-5">
            <!-- LEFT CONTENT -->
            <div class="col-lg-8">
                <!-- Course Image -->
                <div class="text-center mb-5">
                    <img src="../assets/img/<?= htmlspecialchars($row['image']) ?>"
                        class="course-image-large img-fluid mx-auto d-block shadow-lg"
                        alt="<?= htmlspecialchars($row['title']) ?>"
                        loading="lazy"
                        onerror="this.src='https://placehold.co/800x400/667eea/ffffff?text=<?= urlencode($row['title']) ?>'">
                </div>

                <!-- Course Navigation - STATIC (Không scroll theo) -->
                <div class="sidebar-card p-4 mb-5">
                    <h6 class="fw-bold mb-3 pb-2 border-bottom border-primary">
                        <i class="fa-solid fa-list me-2"></i>NỘI DUNG KHÓA HỌC
                    </h6>
                    <ul class="nav flex-column course-nav-nav" style="font-size: 0.95rem;">
                        <li class="nav-item mb-2">
                            <a class="nav-link course-nav-link px-4 py-3 rounded-3 active shadow-sm text-decoration-none"
                                href="#overview" style="border-left: 4px solid #667eea;">
                                <i class="fa-solid fa-info-circle me-2 text-primary"></i>
                                Tổng quan
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link course-nav-link px-4 py-3 rounded-3 text-decoration-none shadow-sm"
                                href="#curriculum" style="border-left: 3px solid #28a745;">
                                <i class="fa-solid fa-list-check me-2 text-success"></i>
                                Nội dung (<?= htmlspecialchars($row['duration']) ?>)
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link course-nav-link px-4 py-3 rounded-3 text-decoration-none shadow-sm"
                                href="#instructor" style="border-left: 3px solid #ffc107;">
                                <i class="fa-solid fa-user-tie me-2 text-warning"></i>
                                Giảng viên
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link course-nav-link px-4 py-3 rounded-3 text-decoration-none shadow-sm"
                                href="#reviews" style="border-left: 3px solid #17a2b8;">
                                <i class="fa-solid fa-star me-2 text-info"></i>
                                Đánh giá (4.8★)
                            </a>
                        </li>
                    </ul>

                    <!-- Quick Info -->
                    <div class="mt-4 pt-3 border-top small text-center">
                        <div class="mb-2"><i class="fa-solid fa-users text-primary me-1"></i>50K+ học viên</div>
                        <div><i class="fa-solid fa-award text-warning me-1"></i>Chứng chỉ có giá trị</div>
                    </div>
                </div>
                <!-- Tab Content -->
                <div class="tab-content">
                    <!-- Overview Tab -->
                    <div class="tab-pane active" id="overview">
                        <h2 class="fw-bold mb-4"> Mô tả khóa học</h2>
                        <div class="row mb-5">
                            <div class="col-md-8">
                                <p class="lead mb-4"><?= nl2br(htmlspecialchars($row['description'])) ?></p>
                            </div>

                        </div>
                        <!-- What you'll learn -->
                        <div class="row g-4 mb-5">
                            <div class="col-12">
                                <h3 class="fw-bold mb-4"> Bạn sẽ học được gì ?</h3>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li class="mb-3 p-3 bg-light rounded-3">
                                        <i class="fa-solid fa-check-circle text-success me-3"></i>
                                        Kỹ năng thực hành từ A-Z
                                    </li>
                                    <li class="mb-3 p-3 bg-light rounded-3">
                                        <i class="fa-solid fa-check-circle text-success me-3"></i>
                                        Dự án thực tế áp dụng ngay
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li class="mb-3 p-3 bg-light rounded-3">
                                        <i class="fa-solid fa-check-circle text-success me-3"></i>
                                        Hỗ trợ 24/7 từ giảng viên
                                    </li>
                                    <li class="mb-3 p-3 bg-light rounded-3">
                                        <i class="fa-solid fa-check-circle text-success me-3"></i>
                                        Cộng đồng học viên lớn mạnh
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Curriculum -->
                    <div class="tab-pane" id="curriculum">
                        <h2 class="fw-bold mb-4"> Nội dung khóa học</h2>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="curriculum-item">
                                    <h6 class="fw-bold mb-2"> Giới thiệu</h6>
                                    <small class="text-muted">2 bài • 30 phút</small>
                                </div>
                                <div class="curriculum-item">
                                    <h6 class="fw-bold mb-2"> Cài đặt môi trường</h6>
                                    <small class="text-muted">4 bài • 1 giờ 15 phút</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="curriculum-item">
                                    <h6 class="fw-bold mb-2"> Dự án thực hành</h6>
                                    <small class="text-muted">8 bài • 4 giờ 30 phút</small>
                                </div>
                                <div class="curriculum-item">
                                    <h6 class="fw-bold mb-2"> Hoàn thành & chứng chỉ</h6>
                                    <small class="text-muted">3 bài • 45 phút</small>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-5">
                            <div class="progress mb-3 mx-auto" style="width: 70%;">
                                <div class="progress-bar progress-fill"
                                    role="progressbar"
                                    data-progress="65%"
                                    aria-valuenow="65"
                                    aria-valuemin="0"
                                    aria-valuemax="100">
                                </div>
                            </div>
                            <small class="text-muted">Tiến độ học tập: 65%</small>
                        </div>
                    </div>

                    <!-- Instructor -->
                    <div class="tab-pane" id="instructor">
                        <h2 class="fw-bold mb-4"> Giảng viên</h2>
                        <div class="instructor-card mb-5">
                            <div class="position-relative z-index-1">
                                <img src="https://placehold.co/120x120/ffffff/667eea?text=GV"
                                    class="rounded-circle shadow-lg mb-3 mx-auto d-block"
                                    style="width: 120px; height: 120px;"
                                    alt="<?= htmlspecialchars($row['instructor']) ?>">
                                <h4 class="fw-bold mb-2"><?= htmlspecialchars($row['instructor']) ?></h4>
                                <p class="lead mb-3">Chuyên gia <?= htmlspecialchars($row['category']) ?> với 10+ năm kinh nghiệm</p>
                                <div class="d-flex justify-content-center gap-3">
                                    <span class="badge bg-light text-dark fs-6">50K học viên</span>
                                    <span class="badge bg-light text-dark fs-6">4.9★</span>
                                </div>
                            </div>
                        </div>
                        <p class="lead">
                            Với hơn 10 năm kinh nghiệm trong lĩnh vực <?= htmlspecialchars($row['category']) ?>,
                            giảng viên đã đào tạo hàng ngàn học viên thành công và hiện đang làm việc
                            tại các công ty công nghệ hàng đầu.
                        </p>
                    </div>

                    <!-- Reviews -->
                    <div class="tab-pane" id="reviews">
                        <h2 class="fw-bold mb-4"> Đánh giá & nhận xét</h2>
                        <div class="row mb-5">
                            <div class="col-md-4 text-center mb-4">
                                <div class="text-warning mb-2">
                                    <i class="fa-solid fa-star fa-2x"></i>
                                    <i class="fa-solid fa-star fa-2x"></i>
                                    <i class="fa-solid fa-star fa-2x"></i>
                                    <i class="fa-solid fa-star fa-2x"></i>
                                    <i class="fa-solid fa-star fa-2x"></i>
                                </div>
                                <h3 class="fw-bold">4.8</h3>
                                <small class="text-muted">(2,456 đánh giá)</small>
                            </div>
                            <div class="col-md-8">
                                <div class="row text-center">
                                    <div class="col-3">
                                        <div class="progress" style="height:8px;">
                                            <div class="progress-bar bg-warning" style="width:75%"></div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="progress" style="height:8px;">
                                            <div class="progress-bar bg-primary" style="width:18%"></div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="progress" style="height:8px;">
                                            <div class="progress-bar bg-info" style="width:5%"></div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="progress" style="height:8px;">
                                            <div class="progress-bar bg-secondary" style="width:2%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Reviews list -->
                        <div id="reviewsContainer">
                            <div class="testimonial-card mb-4">
                                <div class="d-flex align-items-start mb-3">
                                    <div class="flex-shrink-0">
                                        <img src="https://placehold.co/50x50/667eea/ffffff?text=NV" class="rounded-circle" style="width:50px;height:50px;">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <div class="d-flex justify-content-between align-items-start mb-1">
                                            <h6 class="mb-1">Nguyễn Văn A</h6>
                                            <div class="text-warning">★★★★★</div>
                                        </div>
                                        <small class="text-muted">Hôm qua</small>
                                    </div>
                                </div>
                                <p class="mb-0">Khóa học tuyệt vời! Nội dung rất chi tiết và thực tế. Giảng viên nhiệt tình hỗ trợ. Rất recommend!</p>
                            </div>
                            <div class="testimonial-card mb-4">
                                <div class="d-flex align-items-start mb-3">
                                    <div class="flex-shrink-0">
                                        <img src="https://placehold.co/50x50/764ba2/ffffff?text=TB" class="rounded-circle" style="width:50px;height:50px;">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <div class="d-flex justify-content-between align-items-start mb-1">
                                            <h6 class="mb-1">Trần Thị B</h6>
                                            <div class="text-warning">★★★★☆</div>
                                        </div>
                                        <small class="text-muted">2 ngày trước</small>
                                    </div>
                                </div>
                                <p class="mb-0">Nội dung tốt nhưng mong có thêm bài tập thực hành. Tổng thể vẫn rất hài lòng!</p>
                            </div>
                        </div>

                        <!-- Review Form -->
                        <div class="mt-5 p-4 bg-light rounded-4">
                            <h5 class="fw-bold mb-4">Viết đánh giá của bạn</h5>
                            <form id="reviewForm">
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <div class="text-warning fs-4 mb-2">Đánh giá của bạn:</div>
                                        <div class="d-flex gap-2">
                                            <input type="radio" name="rating" value="5" id="star5" class="d-none">
                                            <label for="star5" class="fa-solid fa-star fs-4 cursor-pointer"></label>
                                            <input type="radio" name="rating" value="4" id="star4" class="d-none">
                                            <label for="star4" class="fa-solid fa-star fs-4 cursor-pointer"></label>
                                            <input type="radio" name="rating" value="3" id="star3" class="d-none">
                                            <label for="star3" class="fa-solid fa-star fs-4 cursor-pointer"></label>
                                            <input type="radio" name="rating" value="2" id="star2" class="d-none">
                                            <label for="star2" class="fa-solid fa-star fs-4 cursor-pointer"></label>
                                            <input type="radio" name="rating" value="1" id="star1" class="d-none">
                                            <label for="star1" class="fa-solid fa-star fs-4 cursor-pointer"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <textarea id="reviewComment" class="form-control" rows="4" placeholder="Chia sẻ trải nghiệm học tập của bạn..."></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary px-5 py-2 fw-bold">Gửi đánh giá</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT SIDEBAR - STATIC -->
            <div class="col-lg-4">
                <!-- Buy Box - STATIC (Không sticky) -->
                <div class="sidebar-card p-4 mb-4 shadow-lg border-0">
                    <!-- Price Badge -->
                    <div class="text-center mb-4 pb-3 border-bottom border-primary">
                        <div class="price-badge mb-3 mx-auto d-block" style="max-width: 220px;">
                            <div class="h3 fw-bold mb-1"><?= number_format($row['price']) ?>đ</div>
                            <div class="badge bg-success fs-6 px-3 py-1">
                                <i class="fa-solid fa-arrow-down me-1"></i>Giảm 30%
                            </div>
                            <small class="text-muted d-block mt-1">Giá gốc: <s><?= number_format($row['price'] * 1.3) ?>đ</s></small>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mb-4">
                        <button id="addToCartBtn" class="btn btn-primary w-100 mb-3 fw-bold py-4 fs-6 shadow-lg" style="border-radius: 15px;">
                            <i class="fa-solid fa-cart-shopping fa-lg me-2"></i>
                            Thêm vào giỏ hàng
                        </button>
                        <button id="buyNowBtn" class="btn btn-warning w-100 fw-bold py-4 fs-6 shadow-lg" style="border-radius: 15px; border: none;">
                            <i class="fa-solid fa-bolt fa-lg me-2"></i>
                            Mua ngay - Học liền!
                        </button>
                    </div>

                    <!-- Features -->
                    <div class="mb-4">
                        <h6 class="fw-bold mb-3 text-primary">
                            <i class="fa-solid fa-check-double me-2"></i>Cam kết chất lượng
                        </h6>
                        <ul class="list-unstyled fs-6 lh-lg">
                            <li class="mb-2 p-2 bg-light rounded-3">
                                <i class="fa-solid fa-infinity text-success me-2"></i>Truy cập trọn đời
                            </li>
                            <li class="mb-2 p-2 bg-light rounded-3">
                                <i class="fa-solid fa-mobile-screen text-success me-2"></i>Học mọi lúc mọi nơi
                            </li>
                            <li class="mb-2 p-2 bg-light rounded-3">
                                <i class="fa-solid fa-certificate text-success me-2"></i>Chứng chỉ hoàn thành
                            </li>
                            <li class="mb-2 p-2 bg-light rounded-3">
                                <i class="fa-solid fa-headset text-success me-2"></i>Hỗ trợ 24/7
                            </li>
                            <li class="p-2 bg-light rounded-3">
                                <i class="fa-solid fa-undo text-success me-2"></i>Hoàn tiền 30 ngày
                            </li>
                        </ul>
                    </div>

                    <!-- Quick Stats -->
                    <div class="text-center pt-3 border-top">
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="fw-bold text-primary h5 mb-1">4.8</div>
                                <small class="text-muted">★ Đánh giá</small>
                            </div>
                            <div class="col-6">
                                <div class="fw-bold text-success h5 mb-1">50K+</div>
                                <small class="text-muted">Học viên</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Price Guarantee & Support - STATIC -->
                <div class="sidebar-card p-4 shadow-lg border-0">
                    <!-- Price Breakdown -->
                    <div class="mb-4">
                        <h6 class="fw-bold mb-3 pb-2 border-bottom border-success text-success">
                            <i class="fa-solid fa-tags me-2"></i>Giá trị bạn nhận được
                    </div>
                    <div class="list-group list-group-flush">
                        <div class="list-group-item px-0 py-3 border-0">
                            <div class="row align-items-center">
                                <div class="col-2">
                                    <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center" style="width:45px;height:45px;">
                                        <i class="fa-solid fa-video fa-lg"></i>
                                    </div>
                                </div>
                                <div class="col-10 ps-0">
                                    <div class="fw-bold small mb-1">Video HD chất lượng cao</div>
                                    <small class="text-muted">Tất cả bài giảng Full HD 1080p</small>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item px-0 py-3 border-0">
                            <div class="row align-items-center">
                                <div class="col-2">
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center" style="width:45px;height:45px;">
                                        <i class="fa-solid fa-download fa-lg"></i>
                                    </div>
                                </div>
                                <div class="col-10 ps-0">
                                    <div class="fw-bold small mb-1">Tài liệu tải về</div>
                                    <small class="text-muted">Source code + Slide + Cheat sheet</small>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item px-0 py-3 border-0">
                            <div class="row align-items-center">
                                <div class="col-2">
                                    <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-flex align-items-center justify-content-center" style="width:45px;height:45px;">
                                        <i class="fa-solid fa-project-diagram fa-lg"></i>
                                    </div>
                                </div>
                                <div class="col-10 ps-0">
                                    <div class="fw-bold small mb-1">3 dự án thực tế</div>
                                    <small class="text-muted">Portfolio sẵn sàng xin việc</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Guarantee Box -->
                <div class="bg-gradient text-white p-4 rounded-3 mb-3" style="background: linear-gradient(135deg, #28a745, #20c997) !important;">
                    <div class="text-center">
                        <i class="fa-solid fa-shield-check fa-2x mb-2 opacity-90"></i>
                        <h6 class="fw-bold mb-2">Bảo hành học tập</h6>
                        <div class="small mb-2">Không hài lòng? Hoàn tiền 100% trong 30 ngày</div>
                        <div class="badge bg-light text-success px-3 py-1 small fw-bold">Đã kiểm chứng</div>
                    </div>
                </div>



            </div>
        </div>

        <!-- Related Courses -->
        <div class="sidebar-card p-4">
            <h5 class="fw-bold mb-4"> Khóa học liên quan</h5>
            <div class="row g-3">
                <?php for ($i = 1; $i <= 3; $i++): ?>
                    <div class="col-12">
                        <div class="d-flex align-items-center p-3 bg-light rounded-3 course-card-mini">
                            <img src="https://placehold.co/60x45/667eea/ffffff?text=C<?= $i ?>"
                                class="rounded me-3" style="width:60px;height:45px;object-fit:cover;">
                            <div class="flex-grow-1">
                                <h6 class="mb-1 fw-bold small">Khóa học <?= $i ?></h6>
                                <small class="text-muted">199,000đ</small>
                            </div>
                            <a href="#" class="btn btn-sm btn-outline-primary">Xem</a>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>

<!-- Load JS riêng -->
<script defer src="../assets/js/course_detail.js"></script>

<?php
$conn->close();
include("../includes/footer.php");
?>