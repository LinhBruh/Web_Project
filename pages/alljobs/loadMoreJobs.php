<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "project_web";

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 

$offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;
$limit = 10; // Số lượng công việc muốn tải thêm

$query = "SELECT * FROM cong_viec LIMIT $offset, $limit"; // Thay đổi truy vấn để lấy công việc từ offset
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result)) {
    echo "<div class='box'>
            <div class='company'>
                <img src='images/icon-4.jpg' alt=''>
                <div>
                    <h3>" . htmlspecialchars($row['tenCongViec']) . "</h3>
                    <span>" . htmlspecialchars($row['moTa']) . "</span>
                </div>
            </div>
            <h3 class='job-title'>" . htmlspecialchars($row['viTri']) . "</h3>
            <p class='location'><i class='fas fa-map-marker-alt'></i>
                <span>Hà Nội, Việt Nam</span></p>
            <div class='tags'>
                <p><i class='fas fa-dollar-sign'></i> <span>" . htmlspecialchars($row['luong']) . "</span></p>
                <p><i class='fas fa-briefcase'></i> <span>" . htmlspecialchars($row['kieuCongViec']) . "</span></p>
                <p><i class='fas fa-clock'></i> <span>All day</span></p>
            </div>
            <div class='flex-btn'>
                <a href='view_job.html' class='btn'>view details</a>
                <button type='submit' class='far fa-heart' name='save'></button>
            </div>
        </div>";
}
?>