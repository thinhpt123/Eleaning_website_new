<?php
$current_page = 'about';
$page_title   = 'Về Chúng Tôi';
$base_path    = '';

include '../includes/header.php';
?>

<!-- Load CSS riêng -->
<link rel="stylesheet" href="../assets/css/about.css">

<!-- ===== HERO ABOUT ===== -->
<section class="py-5 hero-section text-white position-relative">
    <div class="container text-center position-relative z-index-1">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="fw-bold display-4 mb-4 animate__animated animate__fadeInDown">
                    Về <span class="text-warning">EduLearn</span>
                </h1>
                <p class="lead mb-4 animate__animated animate__fadeInUp">
                    Nền tảng học trực tuyến giúp bạn phát triển kỹ năng và sự nghiệp với
                    <span class="fw-bold">công nghệ tiên tiến nhất</span>
                </p>
                <div class="animate__animated animate__zoomIn">
                    <a href="course.php" class="btn btn-warning btn-lg fw-bold btn-glow px-5 py-3 me-3">
                        Khám phá ngay
                    </a>
                    <a href="#team" class="btn btn-outline-light btn-lg fw-bold px-5 py-3">
                        Xem đội ngũ
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="shape-divider">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 24 1200 207.27333" preserveAspectRatio="none">
            <path d="m985.66667,153.33333c0,17.33333-168.33333,85.71429-397.33333,76.19048-217.33333-9.52381-382.66667-76.19048-382.66667-76.19048v92.85715h780v-92.85715z" class="shape-fill"></path>
        </svg>
    </div>
</section>

<!-- ===== GIỚI THIỆU ===== -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                <span class="badge bg-primary px-3 py-2 fw-bold mb-3">Câu chuyện của chúng tôi</span>
                <h2 class="fw-bold display-5 mb-4">Từ ý tưởng đến <span class="text-primary">nền tảng hàng đầu</span></h2>
                <p class="lead mb-4">
                    Thành lập năm 2026, EduLearn bắt đầu với sứ mệnh mang đến cơ hội học tập chất lượng cao cho tất cả mọi người.
                </p>
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary bg-opacity-10 p-3 rounded-circle me-3">
                                <i class="fa-solid fa-laptop-code fa-lg text-primary"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">500+ Khóa học</h6>
                                <small class="text-muted">Đa dạng lĩnh vực</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center">
                            <div class="bg-success bg-opacity-10 p-3 rounded-circle me-3">
                                <i class="fa-solid fa-users fa-lg text-success"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">50K+ Học viên</h6>
                                <small class="text-muted">Thành công</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000">
                <div class="position-relative">
                    <img src="../assets/img/dngv.jpg" alt="Đội ngũ EduLearn" class="img-fluid rounded-5 shadow-lg w-100" loading="lazy">
                    <div class="position-absolute top-50 start-0 translate-middle-y bg-primary bg-opacity-20 p-3 rounded-end">
                        <i class="fa-solid fa-award fa-2x text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== SỨ MỆNH - TẦM NHÌN ===== -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-gradient text-white px-4 py-2 fw-bold mb-3">Giá trị cốt lõi</span>
            <h2 class="fw-bold display-5 mb-3">Điều làm nên <span class="text-primary">EduLearn</span></h2>
        </div>
        <div class="row g-4">
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="0">
                <div class="card-hover p-5 text-center h-100 rounded-4">
                    <div class="bg-primary bg-opacity-10 p-4 rounded-circle d-inline-flex mb-4" style="width: 80px; height: 80px;">
                        <i class="fa-solid fa-bullseye fa-2x text-primary m-auto"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Sứ mệnh</h5>
                    <p class="text-muted lead">
                        Mang giáo dục chất lượng cao đến mọi người, không giới hạn về thời gian và không gian.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                <div class="card-hover p-5 text-center h-100 rounded-4">
                    <div class="bg-success bg-opacity-10 p-4 rounded-circle d-inline-flex mb-4" style="width: 80px; height: 80px;">
                        <i class="fa-solid fa-eye fa-2x text-success m-auto"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Tầm nhìn</h5>
                    <p class="text-muted lead">
                        Trở thành nền tảng học trực tuyến hàng đầu tại Việt Nam và khu vực Đông Nam Á.
                    </p>
                </div>
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="400">
                <div class="card-hover p-5 text-center h-100 rounded-4">
                    <div class="bg-warning bg-opacity-10 p-4 rounded-circle d-inline-flex mb-4" style="width: 80px; height: 80px;">
                        <i class="fa-solid fa-star fa-2x text-warning m-auto"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Giá trị cốt lõi</h5>
                    <p class="text-muted lead">
                        Chất lượng – Đổi mới – Lấy học viên làm trung tâm.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== THỐNG KÊ ===== -->
<section class="py-5 position-relative overflow-hidden">
    <div class="container text-center position-relative z-index-1">
        <div class="row g-4 justify-content-center">
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="0">
                <div class="card-hover p-4 rounded-4 h-100">
                    <h2 class="fw-bold stat-number mb-2 counter" data-target="500">0</h2>
                    <p class="text-muted fw-bold fs-5">Khóa học</p>
                    <div class="bg-primary bg-opacity-10 rounded-circle mx-auto mb-3" style="width: 60px; height: 60px;">
                        <i class="fa-solid fa-book fa-lg text-primary m-auto d-block mt-2"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                <div class="card-hover p-4 rounded-4 h-100">
                    <h2 class="fw-bold stat-number mb-2 counter" data-target="50">0</h2>
                    <p class="text-muted fw-bold fs-5">K+ Học viên</p>
                    <div class="bg-success bg-opacity-10 rounded-circle mx-auto mb-3" style="width: 60px; height: 60px;">
                        <i class="fa-solid fa-users fa-lg text-success m-auto d-block mt-2"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                <div class="card-hover p-4 rounded-4 h-100">
                    <h2 class="fw-bold stat-number mb-2 counter" data-target="200">0</h2>
                    <p class="text-muted fw-bold fs-5">+ Giảng viên</p>
                    <div class="bg-warning bg-opacity-10 rounded-circle mx-auto mb-3" style="width: 60px; height: 60px;">
                        <i class="fa-solid fa-chalkboard-user fa-lg text-warning m-auto d-block mt-2"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                <div class="card-hover p-4 rounded-4 h-100">
                    <h2 class="fw-bold stat-number mb-2 counter" data-target="4.8">0</h2>
                    <p class="text-muted fw-bold fs-5">★ Đánh giá</p>
                    <div class="bg-danger bg-opacity-10 rounded-circle mx-auto mb-3" style="width: 60px; height: 60px;">
                        <i class="fa-solid fa-star fa-lg text-warning m-auto d-block mt-2"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== ĐỘI NGŨ ===== -->
<section class="py-5 bg-light" id="team">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-gradient text-white px-4 py-2 fw-bold mb-3">Đội ngũ xuất sắc</span>
            <h2 class="fw-bold display-5 mb-3">Giảng viên <span class="text-primary">hàng đầu</span></h2>
            <p class="lead text-muted">Những chuyên gia hàng đầu trong lĩnh vực của họ</p>
        </div>

        <div class="row g-4">
            <?php
            $team = [
                ['name' => 'Nguyễn Văn A', 'role' => 'Frontend Developer', 'color' => 'primary'],
                ['name' => 'Trần Thị B',   'role' => 'Data Scientist', 'color' => 'success'],
                ['name' => 'Lê Văn C',     'role' => 'UI/UX Designer', 'color' => 'warning'],
                ['name' => 'Phạm Thị D',   'role' => 'Marketing Expert', 'color' => 'danger'],
            ];

            foreach ($team as $index => $member):
            ?>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                    <div class="team-card card-hover h-100 rounded-4 overflow-hidden position-relative text-center p-4">
                        <div class="position-relative mb-3">
                            <img src="https://placehold.co/200x200/667eea/ffffff?text=<?= substr($member['name'], 0, 1) ?>"
                                class="rounded-circle shadow-lg" style="width: 120px; height: 120px; object-fit: cover;" loading="lazy"
                                alt="<?= $member['name'] ?>">
                        </div>
                        <h6 class="fw-bold mb-2"><?= $member['name'] ?></h6>
                        <p class="text-muted mb-3"><?= $member['role'] ?></p>
                        <div class="team-overlay">
                            <h6 class="fw-bold mb-1"><?= $member['name'] ?></h6>
                            <p class="mb-2"><?= $member['role'] ?></p>
                            <a href="#" class="btn btn-sm btn-outline-light" aria-label="Xem profile <?= $member['name'] ?>">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===== CALL TO ACTION ===== -->
<section class="py-5 text-white text-center position-relative overflow-hidden">
    <div class="position-absolute top-0 left-0 w-100 h-100" style="background: var(--secondary-gradient);"></div>
    <div class="container position-relative z-index-1">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="fw-bold display-4 mb-4">Bắt đầu hành trình học tập <span class="text-warning">ngay hôm nay</span></h2>
                <p class="lead mb-5">
                    Tham gia cùng hàng nghìn học viên đang nâng cao kỹ năng mỗi ngày
                </p>
                <a href="course.php" class="btn btn-warning btn-lg fw-bold btn-glow px-5 py-3 fs-5">
                    <i class="fa-solid fa-rocket me-2"></i>Khám phá khóa học
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Load JS riêng (cuối trang để tối ưu tốc độ) -->
<script defer src="../assets/js/about.js"></script>

<?php include '../includes/footer.php'; ?>