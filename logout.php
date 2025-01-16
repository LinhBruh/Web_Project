<?php
session_start();
session_destroy(); // Hủy tất cả session
header("Location: index.php?action=index&id=1"); // Điều hướng về trang chủ
exit();
?>
