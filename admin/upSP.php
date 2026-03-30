<?php
/**
 * ADMIN/ADD-PRODUCT.PHP — LAYOUT THÊM SẢN PHẨM
 * ================================================
 * Giữ nguyên cấu trúc $base_path để nhận CSS/JS từ thư mục gốc.
 * ================================================
 */

$admin_page = 'products'; 
$page_title = 'Thêm sản phẩm mới';
$base_path  = '../'; 

include '../includes/header.php';
?>

<div class="d-flex">
    <?php include '../includes/sidebar_admin.php'; ?>

    <main class="flex-grow-1 p-4" style="margin-left: 260px; background-color: #f8f9fa; min-height: 100vh;">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold mb-0">Tạo sản phẩm mới</h4>
                <small class="text-muted">Quản lý kho hàng và khóa học hệ thống</small>
            </div>
            <div>
                <button type="button" class="btn btn-light border me-2">Hủy bỏ</button>
                <button type="submit" form="productForm" class="btn btn-primary px-4">
                    <i class="fa-solid fa-cloud-arrow-up me-2"></i>Đăng sản phẩm
                </button>
            </div>
        </div>

        <form id="productForm" action="#" method="POST" enctype="multipart/form-data">
            <div class="row g-4">
                
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-white py-3">
                            <h6 class="mb-0 fw-bold text-primary">Thông tin cơ bản</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Tên sản phẩm / Khóa học</label>
                                <input type="text" class="form-control form-control-lg" placeholder="Nhập tên sản phẩm...">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Mô tả tóm tắt</label>
                                <textarea class="form-control" rows="3" placeholder="Mô tả ngắn gọn về sản phẩm..."></textarea>
                            </div>
                            <div class="mb-0">
                                <label class="form-label fw-bold">Nội dung chi tiết</label>
                                <textarea class="form-control" rows="10" placeholder="Viết nội dung đầy đủ tại đây..."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white py-3">
                            <h6 class="mb-0 fw-bold text-primary">Cấu hình nâng cao</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Mã SKU</label>
                                    <input type="text" class="form-control" placeholder="Ví dụ: PRD-001">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Trạng thái kho</label>
                                    <select class="form-select">
                                        <option value="1">Còn hàng</option>
                                        <option value="0">Hết hàng</option>
                                        <option value="2">Ngừng kinh doanh</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label fw-bold text-danger">Giá bán lẻ (VNĐ)</label>
                                <div class="input-group">
                                    <input type="number" class="form-control fw-bold text-danger" placeholder="0">
                                    <span class="input-group-text bg-light">đ</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold text-muted text-decoration-line-through">Giá gốc (Nếu có)</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" placeholder="0">
                                    <span class="input-group-text bg-light">đ</span>
                                </div>
                            </div>
                            <hr>
                            <div class="mb-0">
                                <label class="form-label fw-bold">Danh mục</label>
                                <select class="form-select mb-2">
                                    <option value="">Chọn danh mục chính</option>
                                    <option>Lập trình Web</option>
                                    <option>Marketing Online</option>
                                    <option>Graphic Design</option>
                                </select>
                                <a href="#" class="text-decoration-none small"><i class="fa-solid fa-plus me-1"></i>Thêm danh mục mới</a>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white py-3">
                            <h6 class="mb-0 fw-bold">Ảnh sản phẩm</h6>
                        </div>
                        <div class="card-body text-center">
                            <label for="imgInput" class="border border-2 border-dashed rounded p-4 d-block cursor-pointer bg-light" id="dropZone">
                                <i class="fa-solid fa-image fa-3x text-muted mb-2"></i>
                                <p class="small text-muted mb-0">Click để chọn ảnh đại diện</p>
                                <input type="file" id="imgInput" class="d-none" accept="image/*">
                            </label>
                            
                            <div id="previewContainer" class="mt-3 d-none position-relative">
                                <img id="imgPreview" src="#" class="img-fluid rounded border shadow-sm">
                                <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1 rounded-circle" id="removeImg">
                                    <i class="fa-solid fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>

    </main>
</div>

<style>
    .cursor-pointer { cursor: pointer; }
    .border-dashed { border-style: dashed !important; }
    .form-control:focus, .form-select:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 0.25rem rgba(37, 99, 235, 0.1);
    }
</style>

<?php
// Logic hiển thị preview ảnh mượt mà
$extra_scripts = <<<SCRIPTS
<script>
    const imgInput = document.getElementById('imgInput');
    const imgPreview = document.getElementById('imgPreview');
    const previewContainer = document.getElementById('previewContainer');
    const dropZone = document.getElementById('dropZone');
    const removeBtn = document.getElementById('removeImg');

    imgInput.onchange = evt => {
        const [file] = imgInput.files;
        if (file) {
            imgPreview.src = URL.createObjectURL(file);
            previewContainer.classList.remove('d-none');
            dropZone.classList.add('d-none');
        }
    }

    removeBtn.onclick = () => {
        imgInput.value = "";
        previewContainer.classList.add('d-none');
        dropZone.classList.remove('d-none');
    }
</script>
SCRIPTS;

include '../includes/footer.php';
?>