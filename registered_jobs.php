<?php
include 'db.php';

// Fetch registered jobs
$sql = "SELECT cj.maCongViec, v.tenCongViec, v.yeuCau, v.viTri, v.luong
        FROM congty_congviec cj
        JOIN cong_viec v ON cj.maCongViec = v.maCongViec
       ";
        $result = mysqli_query($conn, $sql);     

?>

<!DOCTYPE html> 
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách công việc đã đăng ký</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
        }
        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        table th {
            background-color:rgb(5, 90, 90);
            color: white;
        }
        .btn {
            background-color:rgb(5, 90, 90);
            color: white;
            border: none;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color:rgb(5, 90, 90);
        }
        .btn-delete {
            background-color: #dc3545;
        }
        .btn-delete:hover {
            background-color: #a71d2a;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Danh sách công việc đã đăng ký</h1>
        <a href="pages/alljobs/Jobs.php" class="btn">Thêm công việc</a>
        <table>
            <tr>
                <th>STT</th>
                <th>Tên công việc</th>
                <th>Yêu cầu</th>
                <th>Vị trí</th>
                <th>Lương (VNĐ)</th>
                <th>Xem thêm</th>
                <th>Xóa</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                $stt = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$stt}</td>
                        <td>{$row['tenCongViec']}</td>
                        <td>{$row['yeuCau']}</td>
                        <td>{$row['viTri']}</td>
                        <td>" . number_format($row['luong'], 0, ',', '.') . " VNĐ</td>
                        <td><a class='btn' href='job_details.php?maCongViec={$row['maCongViec']}'>Xem chi tiết</a></td>
                        <td><a class='btn btn-delete' href='delete_job.php?maCongViec={$row['maCongViec']}' onclick='return confirm(\"Bạn có đồng ý xóa công việc này?\");'>Xóa</a></td>
                    </tr>";
                    $stt++;
                }
            } else {
                echo "<tr><td colspan='7'>Không có công việc nào đã đăng ký.</td></tr>";
            }
            echo "<p><a href='account.php'>←Trở về</a></p>";
            ?>
        </table>
    </div>
</body>
</html>
