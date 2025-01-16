<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết công việc</title>
    <style>
       

        .container {
            max-width: 900px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #4CAF50;
        }

        
        
        .btn-back {
            display: inline-block;
            text-decoration: none;
            background-color: green;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-back:hover {
            background-color: black;
        }.job-details-table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
}

.job-details-table th, .job-details-table td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
}

.job-details-table th {
    background-color: #f4f4f4;
    font-weight: bold;
}

.job-details-table td {
    background-color: #fff;
}

.job-details-table tr:nth-child(even) td {
    background-color: #f9f9f9;
}

.job-details-table tr:hover td {
    background-color: #f1f1f1;
}

        

    </style>
</head>
<body>
<div class="container">
<h1>Chi tiết công việc</h1><?php
// Kết nối cơ sở dữ liệu
$conn = new mysqli("localhost", "root", "", "project_web");

// Kiểm tra kết nối
if (isset($_GET['maCongViec'])) {
    $maCongViec = $_GET['maCongViec'];

    // Sử dụng Prepared Statement
    $stmt = $conn->prepare("
        SELECT 
            *
        FROM 
        cong_viec
        WHERE 
            maCongViec = ?;
    ");
    
    // Gán tham số
    $stmt->bind_param("i", $maCongViec);

    // Thực thi truy vấn
    $stmt->execute();

    // Lấy kết quả
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $job = $result->fetch_assoc();
        //htmlcss
        
    

        // Hiển thị chi tiết công việc
        echo "<table class='job-details-table'>";
        echo "<tr><th>Mã công việc</th><td>{$job['maCongViec']}</td></tr>";
        echo "<tr><th>Tên công việc</th><td>{$job['tenCongViec']}</td></tr>";
        echo "<tr><th>Mô tả</th><td>{$job['moTa']}</td></tr>";
        echo "<tr><th>Yêu cầu</th><td>{$job['yeuCau']}</td></tr>";
        echo "<tr><th>Vị trí</th><td>{$job['viTri']}</td></tr>";
        echo "<tr><th>Lương</th><td>" . number_format($job['luong'], 2) . " VNĐ</td></tr>";
        echo "<tr><th>Kiểu công việc</th><td>{$job['kieuCongViec']}</td></tr>";
        echo "<tr><th>Ngày đăng</th><td>{$job['ngayDang']}</td></tr>";
        echo "<tr><th>Trạng thái</th><td>{$job['trangThai']}</td></tr>";
        echo "</table>";
        echo "<p><a href='registered_jobs.php'>← Quay lại danh sách công việc</a></p>";
    } else {
        echo "<p>Không tìm thấy công việc.</p>";
    }

    // Đóng Prepared Statement
    $stmt->close();
} else {
    echo "<p>Mã công việc không hợp lệ.</p>";
}
?>
</body>
</html>