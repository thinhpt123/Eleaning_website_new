<?php
/**
 * INCLUDES/FOOTER.PHP
 * ================================================
 * Phần cuối chung của tất cả các trang.
 * Chứa: <footer> HTML và tất cả thẻ <script> JS.
 *
 * CÁCH DÙNG:
 *   Ở cuối mỗi trang con, gọi: include 'includes/footer.php';
 * ================================================
 */
?>

<!-- ================================================
     FOOTER — DÙNG CHUNG MỌI TRANG
     ================================================ -->
<footer class="bg-dark text-white pt-5 pb-3 mt-5">
    <div class="container">
        <div class="row g-4">

            <!-- Cột 1: Thương hiệu -->
            <div class="col-lg-4">
                <h5 class="fw-bold text-primary mb-3">
                    <i class="fa-solid fa-book-open-reader me-2"></i>EduLearn
                </h5>
                <p class="text-muted small">
                    Nền tảng học trực tuyến hàng đầu Việt Nam. Hơn 500+ khóa học
                    chất lượng từ các chuyên gia trong ngành.
                </p>
                <!-- Mạng xã hội -->
                <div class="d-flex gap-3 mt-3">
                    <a href="#" class="text-muted fs-5"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="text-muted fs-5"><i class="fa-brands fa-youtube"></i></a>
                    <a href="#" class="text-muted fs-5"><i class="fa-brands fa-tiktok"></i></a>
                    <a href="#" class="text-muted fs-5"><i class="fa-brands fa-linkedin"></i></a>
                </div>
            </div>

            <!-- Cột 2: Liên kết nhanh -->
            <div class="col-lg-2 col-sm-6">
                <h6 class="fw-bold mb-3">Khóa học</h6>
                <ul class="list-unstyled small text-muted">
                    <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Lập trình Web</a></li>
                    <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Python & AI</a></li>
                    <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Thiết kế UI/UX</a></li>
                    <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Digital Marketing</a></li>
                </ul>
            </div>

            <!-- Cột 3: Hỗ trợ -->
            <div class="col-lg-2 col-sm-6">
                <h6 class="fw-bold mb-3">Hỗ trợ</h6>
                <ul class="list-unstyled small text-muted">
                    <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Trung tâm trợ giúp</a></li>
                    <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Chính sách hoàn tiền</a></li>
                    <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Điều khoản dịch vụ</a></li>
                    <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Liên hệ với chúng tôi</a></li>
                </ul>
            </div>

            <!-- Cột 4: Liên hệ -->
            <div class="col-lg-4">
                <h6 class="fw-bold mb-3">Liên hệ</h6>
                <ul class="list-unstyled small text-muted">
                    <li class="mb-2">
                        <i class="fa-solid fa-location-dot me-2 text-primary"></i>
                        123 Nguyễn Huệ, Q.1, TP.HCM
                    </li>
                    <li class="mb-2">
                        <i class="fa-solid fa-phone me-2 text-primary"></i>
                        1800 1234 (Miễn phí)
                    </li>
                    <li class="mb-2">
                        <i class="fa-solid fa-envelope me-2 text-primary"></i>
                        support@edulearn.vn
                    </li>
                </ul>
                <!-- Đăng ký nhận tin -->
                <div class="input-group mt-3">
                    <input type="email" class="form-control form-control-sm"
                           placeholder="Email của bạn...">
                    <button class="btn btn-primary btn-sm">
                        <i class="fa-solid fa-paper-plane"></i>
                    </button>
                </div>
            </div>

        </div>

        <hr class="border-secondary my-4">

        <!-- Dòng cuối footer -->
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <small class="text-muted">
                    &copy; <?= date('Y') ?> EduLearn. Bảo lưu mọi quyền.
                </small>
            </div>
            <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
                <small class="text-muted">
                    Thiết kế với <i class="fa-solid fa-heart text-danger"></i> tại Việt Nam
                </small>
            </div>
        </div>
    </div>
</footer>

<!-- ================================================
     JAVASCRIPT — ĐẶT CUỐI TRANG ĐỂ TĂNG TỐC ĐỘ TẢI
     ================================================ -->

<!-- Bootstrap 5 Bundle (bao gồm Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- AOS - Animate On Scroll (khởi tạo hiệu ứng cuộn) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init({
        duration: 700,   // Thời gian hiệu ứng (ms)
        once: true,      // Chỉ chạy 1 lần khi cuộn đến
        offset: 80       // Khoảng cách kích hoạt từ cạnh màn hình
    });
</script>

<!-- SweetAlert2 (thông báo đẹp) -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Chart.js (biểu đồ — chỉ dùng ở trang Admin) -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- jQuery (nếu dùng Slick Slider) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Slick Slider CSS + JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css">
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<!-- JS riêng của dự án -->
<script src="<?= $base_path ?>assets/js/main.js"></script>

<!-- Khối JS riêng của từng trang — trang con có thể inject vào đây -->
<?php if (isset($extra_scripts)) echo $extra_scripts; ?>

</body>
</html>
