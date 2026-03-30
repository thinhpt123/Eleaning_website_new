<?php
include("../database/ketnoi.php"); // file kết nối DB

// Lấy dữ liệu từ form
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$role = $_POST['role'];

// 1. Kiểm tra password nhập lại
if ($password != $confirm_password) {
    echo "Mật khẩu không khớp!";
    exit();
}

// 2. Kiểm tra username hoặc email đã tồn tại chưa
$sql_check = "SELECT * FROM users WHERE username='$username' OR email='$email'";
$result = $conn->query($sql_check);

if ($result->num_rows > 0) {
    echo "Tài khoản hoặc email đã tồn tại!";
    exit();
}

// 3. Thêm vào database (GIỐNG FORMAT DB HIỆN TẠI CỦA BẠN)
$sql = "INSERT INTO users (username, email, password, role)
        VALUES ('$username', '$email', '$password', '$role')";

if ($conn->query($sql) === TRUE) {
    echo "Đăng ký thành công!";
    
    // chuyển về trang đăng nhập
    header("Location: ../index/index.php");
} else {
    echo "Lỗi: " . $conn->error;
}
?>