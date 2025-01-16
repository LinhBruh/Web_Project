<?php
session_start();
include("config.php"); // Kết nối cơ sở dữ liệu

// Kiểm tra nếu người dùng chưa đăng nhập
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Bạn cần đăng nhập để tạo hồ sơ.'); window.location='login.php';</script>";
    exit();
}

// Biến thông báo lỗi
$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $maTaiKhoan = $_SESSION['user_id'];
    $hoTen = mysqli_real_escape_string($conn, $_POST['hoTen']);
    $ngaySinh = mysqli_real_escape_string($conn, $_POST['ngaySinh']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $soDienThoai = mysqli_real_escape_string($conn, $_POST['soDienThoai']);
    $diaChi = mysqli_real_escape_string($conn, $_POST['diaChi']);
    $trinhDoHocVan = mysqli_real_escape_string($conn, $_POST['trinhDoHocVan']);
    $kinhNghiem = mysqli_real_escape_string($conn, $_POST['kinhNghiem']);
    $kyNang = mysqli_real_escape_string($conn, $_POST['kyNang']);

    // Xử lý tài liệu liên quan
    $taiLieuLienQuan = '';
    if (isset($_FILES['taiLieu']) && $_FILES['taiLieu']['error'] == 0) {
        $uploadDir = 'uploads/';
        $taiLieu = $uploadDir . basename($_FILES['taiLieu']['name']);
        if (!move_uploaded_file($_FILES['taiLieu']['tmp_name'], $taiLieu)) {
            $errorMessage = "Lỗi khi tải lên tài liệu.";
        }
    }

    // Lưu vào cơ sở dữ liệu nếu không có lỗi
    if (empty($errorMessage)) {
        $query = "INSERT INTO ho_so (maTaiKhoan, hoTen, ngaySinh, email, soDienThoai, diaChi, trinhDoHocVan, kinhNghiem, kyNang, taiLieu) 
                  VALUES ('$maTaiKhoan', '$hoTen', '$ngaySinh', '$email', '$soDienThoai', '$diaChi', '$trinhDoHocVan', '$kinhNghiem', '$kyNang', '$taiLieu')";

        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Hồ sơ đã được lưu thành công!'); window.location='account.php';</script>";
            exit();
        } else {
            $errorMessage = "Lỗi khi lưu hồ sơ: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo CV</title>
    <!-- Custom CSS file link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/style1.css">
</head>
<body>
    <!-- header section starts -->
    <header class="header">
        <section class="flex">
            <a href="index.php" class="Logo"><i class="fas fa-briefcase"></i> Jobs</a>
            <nav class="navbar">
                <a href="index.php?action=index&id=1">Home</a>
                <a href="about.php">About Us</a>
                <a href="pages/alljobs/jobs.php">All Jobs</a>
                <a href="#">Contact Us</a>
                <a href="edit_taikhoan.php">Tài khoản</a>
                <a href="view_profile.php">Xem CV</a>
                <a href="edit_profile.php">Chỉnh sửa CV</a>
                <a href="logout.php">Đăng xuất</a>
            </nav>
            <a href="postjob.php" class="btn" style="margin-top: 0;">Post Job</a>
        </section>
     </header>
    <!-- header section ends -->

    <div class="noidung">
        <div class="hoso"><p>Bạn đã có hồ sơ!</p></div>
    </div>


    <!-- footer section starts -->
    <footer class="footer">
        <div class="credit">&copy;No copyright @2024 by 
            <span>NgoHuyen</span> | all rights reserved!</div>
    </footer>
    <!-- footer section ends -->
    <script src="script.js"></script>
</body>
</html>
