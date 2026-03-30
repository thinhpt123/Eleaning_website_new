<?php
session_start();
include("../database/ketnoi.php");

// Lấy dữ liệu từ form
$email = $_POST['email']; // username hoặc email
$password = $_POST['password'];

// 1. Tìm user
$sql = "SELECT * FROM users WHERE username='$email' OR email='$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {

    $user = $result->fetch_assoc();

    // 2. Kiểm tra password
    if ($password == $user['password']) {

        // 3. Lưu session
        $_SESSION['user'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // 4. Phân quyền
        if ($user['role'] == 'admin') {
            header("Location: ../admin/dashboard.php");
        } else {
            header("Location: ../index/index.php");
        }

        exit();

    } else {
        echo "Sai mật khẩu!";
    }

} else {
    echo "Tài khoản không tồn tại!";
}
?>