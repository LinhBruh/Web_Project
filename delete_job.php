<?php
include 'db.php';

$maCongViec = $_GET['maCongViec'];

// Delete job
$sql = "DELETE FROM congty_congviec WHERE maCongViec = '$maCongViec'";
if ($conn->query($sql)) {
    echo "<script>alert('Xóa công việc thành công!'); window.location='registered_jobs.php';</script>";
} else {
    echo "Lỗi: " . $conn->error;
}
?>
