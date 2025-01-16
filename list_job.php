<?php
// Kết nối cơ sở dữ liệu
$conn = new mysqli('localhost', 'root', '', 'project_web');

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Truy vấn danh sách công việc
$sql = "
    SELECT *
    FROM cong_viec v
    WHERE v.maCongViec NOT IN (
        SELECT cj.maCongViec 
        FROM congty_congviec cj 
        
    )
";


$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách công việc</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .text-white {
            color: #fff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table th,
        table td {
            padding: 10px;
            border: 1px solid #000;
            text-align: center;
        }

        button,
        input[type="submit"] {
            background-color: rgb(5, 90, 90);
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
        
        }
        .btn{
            background-color: rgb(5, 90, 90);
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
        }
        form{
            margin: 0;
            padding: 0;
        }

        button:hover,
        input[type="submit"]:hover {
            background: #0056b3;
        }

        form {
            margin: 20px 0;
        }

        form input {
            margin: 5px 0;
            padding: 10px;
            width: calc(100% - 22px);
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .btn-delete {
            background: #dc3545;
        }

        .btn-delete:hover {
            background: #a71d2a;
        }
    </style>
</head>

<body>
    <h1>Danh sách công việc</h1>
    <table>
        <thead>
            <tr>
                <th>Mã Công Việc</th>
                
                <th>Tên Công Việc</th>
                <th>Vị Trí</th>
                <th>Lương (VNĐ)</th>
                <th>Ngày Đăng</th>
                <th colspan="2">Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['maCongViec']}</td>";
                    echo "<td>{$row['tenCongViec']}</td>";
                    echo "<td>{$row['viTri']}</td>";
                    echo "<td>" . number_format($row['luong'], 2) . " VNĐ</td>";
                    echo "<td>{$row['ngayDang']}</td>";
                    echo "<td><a class='btn' href='job_details.php?maCongViec={$row['maCongViec']}'>Xem chi tiết</a>&nbsp; ";
                    echo "<td>
                            <form method='POST' action='add_to_registered.php'>
                                <input type='hidden' name='maCongViec' value='{$row['maCongViec']}'>
                                <button type='submit'>Thêm</button>
                            </form>
                        </td>";
                    echo "</tr>";;
                }
            } else {
                echo "<tr><td colspan='6'>Không có công việc nào được tìm thấy.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>

<?php
$conn->close();
?>