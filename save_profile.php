<?php
session_start();
if (!isset($_SESSION['maHoSo'])) {
    header("Location: login.php");
    exit();
}

include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $maHoSo = $_SESSION['maHoSo'];
    $hoTen = mysqli_real_escape_string($conn, $_POST['hoTen']);
    $ngaySinh = mysqli_real_escape_string($conn, $_POST['ngaySinh']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $soDienThoai = mysqli_real_escape_string($conn, $_POST['soDienThoai']);
    $diaChi = mysqli_real_escape_string($conn, $_POST['diaChi']);
    $trinhDoHocVan = mysqli_real_escape_string($conn, $_POST['trinhDoHocVan']);
    $kinhNghiem = mysqli_real_escape_string($conn, $_POST['kinhNghiem']);
    $kyNang = mysqli_real_escape_string($conn, $_POST['kyNang']);

    // Xử lý file tài liệu
    $taiLieuPath = null;
    if (!empty($_FILES['taiLieu']['name'])) {
        $targetDir = "uploads/";
        $taiLieuPath = $targetDir . basename($_FILES['taiLieu']['name']);
        if (!move_uploaded_file($_FILES['taiLieu']['tmp_name'], $taiLieuPath)) {
            echo "<script>alert('Tải tài liệu thất bại!'); window.location.href = 'create_profile.php';</script>";
            exit();
        }
    }

    // Kiểm tra xem người dùng đã có hồ sơ hay chưa
    $checkQuery = "SELECT * FROM hoso WHERE maHoSo = '$maHoSo'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if ($checkResult && mysqli_num_rows($checkResult) > 0) {
        echo "<script>alert('Hồ sơ đã tồn tại. Vui lòng chỉnh sửa hồ sơ!'); window.location.href = 'edit_profile.php';</script>";
        exit();
    }

    // Thêm hồ sơ mới
    $insertQuery = "INSERT INTO hoso (maHoSo, hoTen, ngaySinh, email, soDienThoai, diaChi, hocVan, kinhNghiem, kyNang, taiLieu, ) 
                    VALUES ('$maHoSo', '$hoTen', '$ngaySinh', '$email', '$soDienThoai', '$diaChi', '$hocVan', '$kinhNghiem', '$kyNang', '$taiLieu')";
    
    if (mysqli_query($conn, $insertQuery)) {
        echo "<script>alert('Hồ sơ đã được lưu thành công!'); window.location.href = 'account.php';</script>";
    } else {
        echo "<script>alert('Lỗi khi lưu hồ sơ: " . mysqli_error($conn) . "'); window.location.href = 'create_profile.php';</script>";
    }
}
?>
