<?php
include 'db.php';

if (isset($_GET['maCongViec'])) {
    $maCongViec = $_GET['maCongViec'];

    // Kiểm tra xem công việc đã tồn tại hay chưa
    $checkSql = "SELECT COUNT(*) as count FROM congty_congviec WHERE maCongViec = $maCongViec";
    $stmt = $conn->prepare($checkSql);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row['count'] > 0) {
        // Công việc đã tồn tại
        echo "<script>
                alert('Công việc đã tồn tại trong danh sách!');
                window.location='/registered_jobs.php';
              </script>";
    } else {
        // Công việc chưa tồn tại, tiến hành thêm mới
        $insertSql = "INSERT INTO congty_congviec VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insertSql); 
        $value1 = 0; // Giá trị cột column1
        $value3 = 0; // Giá trị cột column3
        $value4 = 0; // Giá trị cột column4
        $value5 = 1; // Giá trị cột column5
        $stmt->bind_param("iiiii", $value1, $maCongViec, $value3, $value4, $value5);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Bạn đã thêm công việc thành công!');
                    window.location='/registered_jobs.php';
                  </script>";
        } else {
            echo "Lỗi khi thêm công việc: " . $conn->error;
        }
    }

    // Đóng kết nối
    $stmt->close();
    $conn->close();
} else {
    echo "Không tìm thấy mã công việc!";
}
?>
