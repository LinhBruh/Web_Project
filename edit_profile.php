<?php
session_start();
include("config.php"); // Kết nối cơ sở dữ liệu

// Kiểm tra nếu người dùng chưa đăng nhập
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Bạn cần đăng nhập để chỉnh sửa hồ sơ.'); window.location='login.php';</script>";
    exit();
}

$maTaiKhoan = $_SESSION['user_id'];
$errorMessage = "";

// Lấy thông tin hồ sơ hiện tại
$query = "SELECT * FROM ho_so WHERE maTaiKhoan = '$maTaiKhoan'";
$result = mysqli_query($conn, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $hoso = mysqli_fetch_assoc($result);
} else {
    echo "<script>alert('Hồ sơ không tồn tại. Vui lòng tạo hồ sơ mới.'); window.location.href = 'create_profile.php';</script>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hoTen = mysqli_real_escape_string($conn, $_POST['hoTen']);
    $ngaySinh = mysqli_real_escape_string($conn, $_POST['ngaySinh']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $soDienThoai = mysqli_real_escape_string($conn, $_POST['soDienThoai']);
    $diaChi = mysqli_real_escape_string($conn, $_POST['diaChi']);
    $trinhDoHocVan = mysqli_real_escape_string($conn, $_POST['trinhDoHocVan']);
    $kinhNghiem = mysqli_real_escape_string($conn, $_POST['kinhNghiem']);
    $kyNang = mysqli_real_escape_string($conn, $_POST['kyNang']);

    // Xử lý tài liệu liên quan
    $taiLieu = $hoso['taiLieu']; // Giữ tài liệu hiện tại nếu không tải lên mới
    if (isset($_FILES['taiLieu']) && $_FILES['taiLieu']['error'] == 0) {
        $uploadDir = 'uploads/';
        $taiLieu = $uploadDir . basename($_FILES['taiLieu']['name']);
        if (!move_uploaded_file($_FILES['taiLieu']['tmp_name'], $taiLieu)) {
            $errorMessage = "Lỗi khi tải lên tài liệu.";
        }
    }

    // Cập nhật hồ sơ nếu không có lỗi
    if (empty($errorMessage)) {
        $sql = "UPDATE ho_so SET hoTen = '$hoTen', ngaySinh = '$ngaySinh', email = '$email', soDienThoai = '$soDienThoai', diaChi = '$diaChi', trinhDoHocVan = '$trinhDoHocVan', kinhNghiem = '$kinhNghiem', kyNang = '$kyNang', taiLieu = '$taiLieu' WHERE maTaiKhoan = '$maTaiKhoan'";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Hồ sơ đã được cập nhật thành công!'); window.location='account.php';</script>";
            exit();
        } else {
            $errorMessage = "Lỗi khi cập nhật hồ sơ: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit CV</title>
    <!-- Custom CSS file link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/style1.css">
</head>
<body>
    <!-- header section starts -->
    <header class="header">
        <section class="flex">
            <a href="index.php?action=index&id=1" class="Logo"><i class="fas fa-briefcase"></i> Jobs</a>
            <nav class="navbar">
                <a href="index.php?action=index&id=1">Home</a>
                <a href="about.php">About Us</a>
                <a href="pages/alljobs/jobs.php">All Jobs</a>
                <a href="#">Contact Us</a>
                <a href="edit_taikhoan.php">Tài khoản</a>
                <a href="create_profile.php">Tạo CV</a>
                <a href="logout.php">Đăng xuất</a>
            </nav>
            <a href="postjob.php" class="btn" style="margin-top: 0;">Post Job</a>
        </section>
     </header>
    <!-- header section ends -->

    <div class="noidung">
        <form action="" method="POST" enctype="multipart/form-data">
            <h2>Chỉnh sửa CV</h2>

            <?php if (!empty($errorMessage)) { echo "<p style='color: red;'>$errorMessage</p>"; } ?>

            <label for="hoTen">Họ và tên:</label>
            <input type="text" id="hoTen" name="hoTen" value="<?php echo htmlspecialchars($hoso['hoTen']); ?>" required>

            <label for="ngaySinh">Ngày sinh:</label>
            <input type="date" id="ngaySinh" name="ngaySinh" value="<?php echo htmlspecialchars($hoso['ngaySinh']); ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($hoso['email']); ?>" required>

            <label for="soDienThoai">Số điện thoại:</label>
            <input type="text" id="soDienThoai" name="soDienThoai" value="<?php echo htmlspecialchars($hoso['soDienThoai']); ?>" required>

            <label for="diaChi">Địa chỉ:</label>
            <input type="text" id="diaChi" name="diaChi" value="<?php echo htmlspecialchars($hoso['diaChi']); ?>">

            <label for="trinhDoHocVan">Trình độ học vấn:</label>
            <input type="text" id="trinhDoHocVan" name="trinhDoHocVan" value="<?php echo htmlspecialchars($hoso['trinhDoHocVan']); ?>">

            <label for="kinhNghiem">Kinh nghiệm:</label>
            <textarea id="kinhNghiem" name="kinhNghiem" rows="4"><?php echo htmlspecialchars($hoso['kinhNghiem']); ?></textarea>

            <label for="kyNang">Kỹ năng:</label>
            <textarea id="kyNang" name="kyNang" rows="4"><?php echo htmlspecialchars($hoso['kyNang']); ?></textarea>

            <label for="taiLieu">Tài liệu liên quan:</label>
            <input type="file" id="taiLieu" name="taiLieu">

            <button type="submit" class="btn">Cập nhật</button>
        </form>
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
