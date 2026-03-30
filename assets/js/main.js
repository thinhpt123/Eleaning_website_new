/**
 * ASSETS/JS/MAIN.JS
 * =====================================================
 * JS chạy chung cho tất cả các trang.
 * Được nhúng vào cuối footer.php.
 * =====================================================
 */

document.addEventListener('DOMContentLoaded', function () {

    // --- Navbar: thêm shadow khi cuộn xuống ---
    window.addEventListener('scroll', function () {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('shadow');
        } else {
            navbar.classList.remove('shadow');
        }
    });

    // --- AOS đã được khởi tạo trong footer.php ---
    // Không cần gọi lại AOS.init() ở đây.

});
