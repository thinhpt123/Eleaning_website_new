<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký Tài Khoản Mới</title>
    <link rel="stylesheet" href="../assets/css/style_form.css">
</head>
<body>
    <div class="register-wrapper">
        <h2>Tạo Tài Khoản</h2>
        
        <form action="xulydangki.php" method="POST">
            
            <div class="input-group">
                <label for="username">Tên đăng nhập <span class="required">*</span></label>
                <input type="text" id="username" name="username" maxlength="50" required placeholder="Ví dụ. user01...">
            </div>

            <div class="input-group">
                <label for="email">Địa chỉ Email <span class="required">*</span></label>
                <input type="email" id="email" name="email" maxlength="100" required placeholder="teo@gmail.com">
            </div>

            <div class="input-group">
                <label for="password">Mật khẩu <span class="required">*</span></label>
                <input type="password" id="password" name="password" minlength="6" required placeholder="Mật khẩu bảo mật">
            </div>

            <div class="input-group">
                <label for="confirm_password">Xác nhận mật khẩu <span class="required">*</span></label>
                <input type="password" id="confirm_password" name="confirm_password" required placeholder="Nhập lại mật khẩu">
            </div>
            
            <input type="hidden" name="role" value="user">

            <button type="submit" class="btn-register">Tạo Tài Khoản</button>
        </form>

        <div class="footer-link">
            Đã có tài khoản? <a href="dangnhap.php">Đăng nhập tại đây</a>
        </div>
    </div>
</body>
</html>