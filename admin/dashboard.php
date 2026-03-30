<?php

// BƯỚC 1: Khai báo biến
$admin_page = 'dashboard';       // Sidebar sẽ tô sáng "Dashboard"
$page_title = 'Admin Dashboard';
$base_path  = '../';             // ← Quan trọng! Trang nằm trong /admin/

// BƯỚC 2: Nhúng header (dùng đường dẫn tương đối từ /admin/)
include '../includes/header.php';
?>

<!-- ================================================
     NỘI DUNG TRANG ADMIN — BỐ CỤC 2 CỘT
     Cột trái: Sidebar | Cột phải: Nội dung chính
     ================================================ -->
<div class="d-flex">

    <!-- Sidebar Admin (fixed bên trái) -->
    <?php include '../includes/sidebar_admin.php'; ?>

    <!-- Nội dung chính (đẩy sang phải để tránh sidebar) -->
    <main class="flex-grow-1 p-4" style="margin-left: 260px;">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold mb-0">Dashboard</h4>
                <small class="text-muted">Tổng quan hoạt động kinh doanh</small>
            </div>
            <span class="badge bg-success">
                <i class="fa-solid fa-circle fa-xs me-1"></i>Hệ thống hoạt động tốt
            </span>
        </div>

        <!-- Thẻ thống kê -->
        <div class="row g-3 mb-4">
            <?php
            $stats = [
                ['label' => 'Doanh thu tháng', 'value' => '72.000.000đ', 'icon' => 'fa-dollar-sign', 'color' => 'success', 'trend' => '+12%'],
                ['label' => 'Tổng khóa học',   'value' => '124',         'icon' => 'fa-book',        'color' => 'primary', 'trend' => '+3'],
                ['label' => 'Học viên',         'value' => '15.234',      'icon' => 'fa-users',       'color' => 'info',    'trend' => '+8%'],
                ['label' => 'Đơn hàng mới',     'value' => '342',         'icon' => 'fa-cart-shopping','color' => 'warning', 'trend' => '+24%'],
            ];
            foreach ($stats as $stat):
            ?>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body d-flex justify-content-between align-items-start">
                        <div>
                            <p class="text-muted small mb-1"><?= $stat['label'] ?></p>
                            <h4 class="fw-bold mb-1"><?= $stat['value'] ?></h4>
                            <small class="text-success">
                                <i class="fa-solid fa-arrow-trend-up me-1"></i><?= $stat['trend'] ?> so với tháng trước
                            </small>
                        </div>
                        <div class="rounded-circle d-flex align-items-center justify-content-center
                                    bg-<?= $stat['color'] ?> bg-opacity-10"
                             style="width:48px;height:48px;">
                            <i class="fa-solid <?= $stat['icon'] ?> text-<?= $stat['color'] ?>"></i>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Biểu đồ doanh thu (Chart.js) -->
        <div class="row g-3">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">Doanh thu 6 tháng gần nhất</h6>
                        <canvas id="revenueChart" height="120"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">Phân bổ danh mục</h6>
                        <canvas id="categoryChart" height="220"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </main>
</div>

<?php
// JS riêng của trang Admin: Khởi tạo biểu đồ Chart.js
$extra_scripts = <<<SCRIPTS
<script>
// Biểu đồ cột — Doanh thu 6 tháng
new Chart(document.getElementById('revenueChart'), {
    type: 'bar',
    data: {
        labels: ['T1', 'T2', 'T3', 'T4', 'T5', 'T6'],
        datasets: [{
            label: 'Doanh thu (VNĐ)',
            data: [45000000, 52000000, 38000000, 65000000, 48000000, 72000000],
            backgroundColor: 'rgba(37, 99, 235, 0.8)',
            borderRadius: 6,
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: {
            y: {
                ticks: {
                    callback: v => (v/1000000) + 'M'
                }
            }
        }
    }
});

// Biểu đồ tròn — Phân bổ danh mục
new Chart(document.getElementById('categoryChart'), {
    type: 'pie',
    data: {
        labels: ['Lập Trình', 'Thiết Kế', 'Marketing', 'Ngoại Ngữ'],
        datasets: [{
            data: [40, 25, 20, 15],
            backgroundColor: ['#2563EB', '#7C3AED', '#EC4899', '#F59E0B'],
        }]
    },
    options: { responsive: true }
});
</script>
SCRIPTS;
?>

<!-- BƯỚC 4: Nhúng footer -->
<?php include '../includes/footer.php'; ?>
