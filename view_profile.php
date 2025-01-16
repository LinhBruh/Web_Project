<?php
session_start();
include 'config.php';

// Kiểm tra người dùng đã đăng nhập
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Bạn cần đăng nhập để xem hồ sơ.'); window.location.href = 'login.php';</script>";
    exit();
}

$maTaiKhoan = $_SESSION['user_id'];

// Lấy thông tin hồ sơ của người dùng
$query = "SELECT * FROM ho_so WHERE maTaiKhoan = '$maTaiKhoan'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $hoso = mysqli_fetch_assoc($result);
} else {
    echo "<script>alert('Không tìm thấy hồ sơ của bạn. Vui lòng tạo hồ sơ.'); window.location.href = 'create_profile.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem Hồ Sơ</title>
    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/style1.css">

    <style>
        table {
            table-layout: auto; /* Cột sẽ tự động điều chỉnh theo nội dung */
            width: auto;        /* Độ rộng của bảng sẽ vừa đủ với nội dung */
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
            position: absolute;
            top: 50%;               /* Đặt bảng ở giữa chiều cao màn hình */
            left: 50%;              /* Đặt bảng ở giữa chiều ngang màn hình */
            transform: translate(-50%, -50%); /* Dịch chuyển bảng để căn giữa hoàn toàn */
        }

        th, td {
            word-wrap: break-word; /* Đảm bảo từ dài sẽ được xuống dòng nếu cần */
            white-space: normal;   /* Nội dung có thể xuống dòng thay vì giữ trên một dòng */
    
         

            padding: 12px;
            text-align: left;
            border: 1px solid black;
        }

        th {
            background-color: rgba(5, 90, 90,1);
            color: white;
            
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        a {
            text-decoration: none;
        }

        .noidung {
            margin: 20px;
        }

        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <header class="header">
        <section class="flex">
            <a href="index.php?action=index&id=1" class="Logo"><i class="fas fa-briefcase"></i> Jobs</a>
            <nav class="navbar">
                <a href="index.php?action=index&id=1">Home</a>
                <a href="about.php">About Us</a>
                <a href="pages/alljobs/jobs.php">All Jobs</a>
                <a href="#">Contact Us</a>
                <a href="edit_profile.php">Chỉnh sửa CV</a>
                <a href="logout.php">Đăng xuất</a>
            </nav>
            <a href="postjob.php" class="btn" style="margin-top: 0;">Post Job</a>
        </section>
     </header>

    <div class="noidung">
        <h1>Thông Tin Hồ Sơ</h1>
        <table>
            <tr>
                <th>Họ và tên:</th>
                <td><?= htmlspecialchars($hoso['hoTen'] ?? 'Chưa cập nhật') ?></td>
            </tr>
            <tr>
                <th>Ngày sinh:</th>
                <td><?= isset($hoso['ngaySinh']) ? date("d-m-Y", strtotime($hoso['ngaySinh'])) : 'Chưa cập nhật' ?></td>

            </tr>
            <tr>
                <th>Email:</th>
                <td><?= htmlspecialchars($hoso['email'] ?? 'Chưa cập nhật') ?></td>
            </tr>
            <tr>
                <th>Số điện thoại:</th>
                <td><?= htmlspecialchars($hoso['soDienThoai'] ?? 'Chưa cập nhật') ?></td>
            </tr>
            <tr>
                <th>Địa chỉ:</th>
                <td><?= htmlspecialchars($hoso['diaChi'] ?? 'Chưa cập nhật') ?></td>
            </tr>
            <tr>
                <th>Trình độ học vấn:</th>
                <td><?= htmlspecialchars($hoso['trinhDoHocVan'] ?? 'Chưa cập nhật') ?></td>
            </tr>
            <tr>
                <th>Kinh nghiệm:</th>
                <td><?= nl2br(htmlspecialchars($hoso['kinhNghiem'] ?? 'Chưa cập nhật')) ?></td>
            </tr>
            <tr>
                <th>Kỹ năng:</th>
                <td><?= nl2br(htmlspecialchars($hoso['kyNang'] ?? 'Chưa cập nhật')) ?></td>
            </tr>
            <tr>
                <th>Tài liệu liên quan:</th>
                <td>
                    <?php if (!empty($hoso['taiLieu'])): ?>
                        <a href="uploads/<?= htmlspecialchars($hoso['taiLieu']) ?>" target="_blank">Tải xuống</a>
                    <?php else: ?>
                        Không có tài liệu
                    <?php endif; ?>
                </td>
            </tr>
        </table>
    </div>

    <footer class="footer">
        <div class="credit">&copy;No copyright @2024 by 
            <span>NgoHuyen</span> | all rights reserved!</div>
    </footer>
    <script src="script.js"></script>
</body>
</html>
