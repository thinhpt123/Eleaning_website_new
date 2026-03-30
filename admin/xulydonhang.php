<?php
/**
 * ADMIN/XULYDONHANG.PHP — QUẢN TRỊ NGHIỆP VỤ ĐƠN HÀNG
 * =========================================================
 * Nghiệp vụ: Admin đối soát ngân hàng -> Nhấn Duyệt -> Kích hoạt quyền truy cập
 */

$admin_page = 'orders'; 
$page_title = 'Xử lý đơn hàng';
$base_path  = '../'; 

include '../includes/header.php';
?>

<div class="d-flex">
    <?php include '../includes/sidebar_admin.php'; ?>

    <main class="flex-grow-1 p-4" style="margin-left: 260px; background-color: #f4f7f6; min-height: 100vh;">
        
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <h4 class="fw-bold mb-1">Phê duyệt thanh toán</h4>
                <p class="text-muted small mb-0">Đối soát minh chứng chuyển khoản và cấp quyền học viên</p>
            </div>
            <div class="d-flex gap-3 text-center">
                <div class="bg-white p-2 px-3 rounded shadow-sm">
                    <small class="text-muted d-block">Chờ thanh toán (0)</small>
                    <span class="fw-bold text-warning">12 đơn</span>
                </div>
                <div class="bg-white p-2 px-3 rounded shadow-sm">
                    <small class="text-muted d-block">Đã hoàn thành (1)</small>
                    <span class="fw-bold text-success">450 đơn</span>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4 py-3 border-0" style="width: 120px;">Mã Đơn</th>
                                <th class="py-3 border-0">Thông tin Khách hàng</th>
                                <th class="py-3 border-0">Khóa học đăng ký</th>
                                <th class="py-3 border-0">Tổng tiền</th>
                                <th class="py-3 border-0">Trạng thái</th>
                                <th class="py-3 border-0 text-end pe-4">Nghiệp vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="ps-4 fw-bold text-dark">#DH12345</td>
                                <td>
                                    <div class="fw-bold">Nguyễn Văn A</div>
                                    <small class="text-muted">ID Người dùng: 502</small>
                                </td>
                                <td>
                                    <div class="text-truncate" style="max-width: 200px;">Lập trình PHP chuyên sâu</div>
                                    <small class="badge bg-light text-dark border">ID Khóa: 12</small>
                                </td>
                                <td class="fw-bold text-danger">599.000đ</td>
                                <td>
                                    <span class="badge bg-warning-opacity text-warning">
                                        <i class="fa-solid fa-spinner fa-spin me-1"></i> Chờ thanh toán
                                    </span>
                                </td>
                                <td class="text-end pe-4">
                                    <button class="btn btn-primary btn-sm px-3 shadow-sm" onclick="confirmApproval('DH12345')">
                                        <i class="fa-solid fa-check-double me-1"></i> Duyệt & Kích hoạt
                                    </button>
                                    <button class="btn btn-outline-secondary btn-sm" title="Hủy đơn">
                                        <i class="fa-solid fa-ban"></i>
                                    </li>
                                </td>
                            </tr>

                            <tr class="bg-light-subtle">
                                <td class="ps-4 text-muted">#DH12340</td>
                                <td>
                                    <div class="text-muted">Trần Thị B</div>
                                    <small class="text-muted">ID Người dùng: 489</small>
                                </td>
                                <td>
                                    <div class="text-muted">Thiết kế đồ họa Pro</div>
                                </td>
                                <td class="text-muted">800.000đ</td>
                                <td>
                                    <span class="badge bg-success">
                                        <i class="fa-solid fa-circle-check me-1"></i> Hoàn thành
                                    </span>
                                </td>
                                <td class="text-end pe-4">
                                    <span class="small text-muted italic">Đã thêm vào bảng HocVien</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="alert alert-info mt-4 border-0 shadow-sm">
            <h6 class="fw-bold"><i class="fa-solid fa-circle-info me-2"></i>Quy tắc hệ thống:</h6>
            <ul class="mb-0 small">
                <li>Khi nhấn <b>Duyệt & Kích hoạt</b>: Trạng thái đơn hàng sẽ chuyển sang <b>"Xong" (1)</b>.</li>
                <li>Hệ thống tự động thêm người dùng vào danh sách học viên (Bảng <b>HocVien</b>) để mở khóa Video bài học.</li>
                <li>Mọi đơn hàng "Chờ" quá 24h sẽ bị đánh dấu mờ để Admin cân nhắc <b>Hủy đơn (2)</b>.</li>
            </ul>
        </div>

    </main>
</div>

<style>
    .bg-warning-opacity { background-color: rgba(255, 193, 7, 0.15); }
    .table tbody tr td { padding: 16px 8px; }
    .btn-sm { font-size: 0.8rem; border-radius: 6px; }
    .badge { padding: 0.5em 0.8em; }
</style>

<?php 
$extra_scripts = <<<SCRIPTS
<script>
function confirmApproval(id) {
    if(confirm('Bạn đã đối soát ngân hàng cho đơn ' + id + '? Hệ thống sẽ cấp quyền truy cập khóa học ngay lập tức.')) {
        alert('Đã phê duyệt đơn hàng ' + id + '. Học viên hiện đã có thể xem bài giảng!');
        // Chỗ này sau này bạn sẽ viết code AJAX để xử lý Backend
    }
}
</script>
SCRIPTS;

include '../includes/footer.php'; 
?>