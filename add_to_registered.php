<?php
include 'db.php'; // Kết nối cơ sở dữ liệu

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $maCongViec = $_POST['maCongViec'] ?? null;
    var_dump($maCongViec);

    if ($maCongViec) {
        // Kiểm tra công việc đã tồn tại trong bảng congty_congviec chưa
        $checkQuery = "SELECT * FROM congty_congviec WHERE maCongViec = '$maCongViec'";
        $checkResult = $conn->query($checkQuery);

        if ($checkResult->num_rows > 0) {
            // Nếu đã tồn tại, cập nhật trạng thái daDangKy
            $sql = "UPDATE congty_congviec SET daDangKy = 1 WHERE maCongViec = '$maCongViec'";
        } else {
            // Nếu chưa tồn tại, thêm mới vào bảng congty_congviec
            $sql = "INSERT INTO congty_congviec (maCongViec, daDangKy) VALUES ('$maCongViec', 1)";
        }

        if ($conn->query($sql) === TRUE) {
            header('Location: registered_jobs.php');
            // echo "<script>alert('Thêm Thành công')</script>";
            exit();
        } else {
            echo "Lỗi khi thêm công việc: " . $conn->error;
        }
    } else {
        echo "Không nhận được mã công việc.";
    }
}
?>
