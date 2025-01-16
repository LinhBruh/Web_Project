<?php
include 'db.php';

if (isset($_POST['submit'])) {
    // Giả sử ID của người dùng được lưu trong session
    session_start();
    $userId = 1; // Thay bằng biến session thực tế

    // Lấy dữ liệu từ form
    $tenCongViec = $_POST['tenCongViec'];
    $moTa = $_POST['moTa'];
    $yeuCau = $_POST['yeuCau'];
    $viTri = $_POST['viTri'];
    $luong = $_POST['luong'];
    $kieuCongViec = $_POST['kieuCongViec'];
    $ngayDang = date('Y-m-d'); // Tự động lấy ngày hiện tại
    $trangThai = 'Hoạt động'; // Trạng thái mặc định

    // Thêm công việc mới (liên kết với người dùng)
    $stmt = $conn->prepare("INSERT INTO cong_viec (tenCongViec, moTa, yeuCau, viTri, luong, kieuCongViec, ngayDang, trangThai, maTaiKhoan) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $tenCongViec, $moTa, $yeuCau, $viTri, $luong, $kieuCongViec, $ngayDang, $trangThai, $userId);

    if ($stmt->execute()) {
        echo "<script>alert('Thêm công việc thành công!'); window.location='registered_jobs.php';</script>";
    } else {
        echo "Lỗi thêm công việc: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Thêm Công Việc</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        form label {
            margin-top: 10px;
            color: #555;
        }
        form input, form textarea, form select, form button {
            margin-top: 5px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        form button {
            background-color: #0288d1;
            color: white;
            font-weight: bold;
            border: none;
            cursor: pointer;
            margin-top: 20px;
        }
        form button:hover {
            background-color: #026c9c;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Thêm Công Việc Mới</h2>
        <form method="POST">
            <label for="tenCongViec">Tên Công Việc:</label>
            <input type="text" name="tenCongViec" id="tenCongViec" placeholder="Nhập tên công việc" required>

            <label for="moTa">Mô Tả Công Việc:</label>
            <textarea name="moTa" id="moTa" rows="4" placeholder="Mô tả công việc chi tiết..."></textarea>

            <label for="yeuCau">Yêu Cầu Công Việc:</label>
            <textarea name="yeuCau" id="yeuCau" rows="4" placeholder="Kinh nghiệm, kỹ năng..."></textarea>

            <label for="viTri">Vị Trí Công Việc:</label>
            <input type="text" name="viTri" id="viTri" placeholder="VD: Nhân viên, Quản lý">

            <label for="luong">Mức Lương (VNĐ):</label>
            <input type="number" name="luong" id="luong" placeholder="Nhập mức lương dự kiến" required>

            <label for="kieuCongViec">Kiểu Công Việc:</label>
            <select name="kieuCongViec" id="kieuCongViec" required>
                <option value="Toàn thời gian">Toàn thời gian</option>
                <option value="Bán thời gian">Bán thời gian</option>
                <option value="Thực tập">Thực tập</option>
                <option value="Freelance">Freelance</option>
            </select>

            <button type="submit" name="submit">Thêm Công Việc</button>
        </form>
    </div>
</body>

</html>
