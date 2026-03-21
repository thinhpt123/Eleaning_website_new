<?php
// Thông số kết nối Railway (Dùng chung cho cả nhóm 4 người)
$host = "centerbeam.proxy.rlwy.net";
$user = "root";
$pass = "sSszTUkfubzElpbYItjzsYDlNaqnhCWT";
$dbname = "railway"; // Tên database mặc định trên Railway là railway
$port = "24960";    // Cổng kết nối công khai bạn vừa tìm thấy

// Tạo kết nối (Phải có đủ 5 tham số)
$conn = new mysqli($host, $user, $pass, $dbname, $port);

// Kiểm tra kết nối
if ($conn->connect_error) {
    // Nếu lỗi, sẽ hiện thông báo để bạn biết đường sửa
    die("Kết nối nhóm lên Railway thất bại: " . $conn->connect_error);
}


?>