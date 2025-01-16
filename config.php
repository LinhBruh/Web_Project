<?php
$servername = "localhost"; // Tên máy chủ
$username = "root"; // Tên người dùng mặc định
$password = ""; // Mật khẩu mặc định (trống)
$dbname = "project_web"; // Tên cơ sở dữ liệu của bạn

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
?>
