<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập System</title>
    <link rel="stylesheet" href="../assets/css/style_form.css">
</head>
<body>
    <div class="login-page"> 
        
        <div class="login-card">
            <div class="card-header">
                <h2>Đăng Nhập</h2>
                <p>Hệ thống quản lý E-Learning</p>
            </div>

            <form action="xulydangnhap.php" method="POST">
                <div class="input-group">
                    <label>Email hoặc Tên đăng nhập</label>
                    <input type="text" name="email" required placeholder="Nhập tài khoản của bạn">
                </div>
                
                <div class="input-group">
                    <label>Mật khẩu</label>
                    <input type="password" name="password" required placeholder="Nhập mật khẩu">
                </div>

                <button type="submit" class="btn-submit">Đăng Nhập</button>
            </form>

            <div class="card-footer">
                Bạn chưa có tài khoản? <a href="dangki.php">Đăng ký ngay</a>
                <hr>
                <a href="../index/index.php" class="back-link"> Quay về trang chủ</a>
            </div>
        </div>
        </div>
</body>
</html>