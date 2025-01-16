<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <!-- Custom CSS file link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/style1.css">
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
                <a href="login.php">Đăng nhập</a>
            </nav>
            <a href="postjob.php" class="btn" style="margin-top: 0;">Post Job</a>
        </section>
    </header>

    <!-- PHP xử lý đăng ký -->
    <?php
   
    session_start();
    include("config.php"); // Kết nối cơ sở dữ liệu

    $errorMessage = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $hoTen = trim(mysqli_real_escape_string($conn, $_POST['hoTen']));
        $diaChi = trim(mysqli_real_escape_string($conn, $_POST['diaChi']));
        $dienThoai = intval(trim($_POST['dienThoai']));
        $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
        $matKhau = trim($_POST['matKhau']);
        $xacNhanMatKhau = trim($_POST['xacNhanMatKhau']);

        if ($matKhau !== $xacNhanMatKhau) {
            $errorMessage = "Mật khẩu và xác nhận mật khẩu không khớp!";
        } else {
            $queryCheck = "SELECT * FROM tai_khoan WHERE email = '$email'";
            $resultCheck = mysqli_query($conn, $queryCheck);

            if ($resultCheck && mysqli_num_rows($resultCheck) > 0) {
                $errorMessage = "Email đã được sử dụng!";
            } else {
                $hashedPassword = password_hash($matKhau, PASSWORD_DEFAULT);
                $ngayTao = date("Y-m-d H:i:s");
                $trangThai = 1;

                $queryInsert = "INSERT INTO tai_khoan (hoTen, diaChi, dienThoai, email, matKhau, ngayTao, trangThai) 
                                VALUES ('$hoTen', '$diaChi', $dienThoai, '$email', '$hashedPassword', '$ngayTao', $trangThai)";

                if (mysqli_query($conn, $queryInsert)) {
                    $userId = mysqli_insert_id($conn);
                    $_SESSION['user_id'] = $userId;
                    $_SESSION['user_email'] = $email;
                    $_SESSION['user_name'] = $hoTen;
                    echo "<script>alert('Đăng ký thành công!'); window.location.href = 'account.php';</script>";
                    exit();
                } else {
                    $errorMessage = "Lỗi: " . mysqli_error($conn);
                }
            }
        }
    }
    ?>

    <!-- Nội dung -->
    <div class="noidung">
        <form action="" method="POST" onsubmit="return validatePhoneNumber()">
            <h2>Đăng ký ngay</h2>
            <br><br>
            <?php if (!empty($errorMessage)) { echo "<p style='color: red;'>$errorMessage</p>"; } ?>

            <label for="hoTen">Họ và tên:</label>
            <input type="text" name="hoTen" placeholder="Nhập họ và tên" required><br><br>

            <label for="diaChi">Địa chỉ:</label>
            <input type="text" name="diaChi" placeholder="Nhập địa chỉ" required><br><br>

            <label for="dienThoai">Số điện thoại:</label>
            <input type="text" id="dienThoai" name="dienThoai" placeholder="Nhập số điện thoại" required><br><br>

            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="Nhập email" required><br><br>

            <label for="matKhau">Mật khẩu:</label>
            <input type="password" id="matKhau" name="matKhau" placeholder="Nhập mật khẩu" required><br><br>

            <label for="xacNhanMatKhau">Xác nhận mật khẩu:</label>
            <input type="password" id="xacNhanMatKhau" name="xacNhanMatKhau" placeholder="Xác nhận mật khẩu" required><br><br>

            <div class="checkbox-container">
                <input type="checkbox" id="showPassword" onclick="togglePasswordVisibility()">
                <label for="showPassword">Hiển thị mật khẩu</label>
            </div><br><br>

            <button type="submit" class="btn">Đăng ký</button>
        </form>

        <script>
        // Tính năng ẩn/hiện mật khẩu
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("matKhau");
            var confirmPasswordField = document.getElementById("xacNhanMatKhau");
            var showPassword = document.getElementById("showPassword").checked;

            passwordField.type = confirmPasswordField.type = showPassword ? "text" : "password";
        }

        // Kiểm tra số điện thoại chỉ chứa số
        function validatePhoneNumber() {
            var phoneNumber = document.getElementById("dienThoai").value;
            var phoneRegex = /^[0-9]+$/;

            if (!phoneRegex.test(phoneNumber)) {
                alert("Số điện thoại chỉ được chứa chữ số.");
                return false;
            }
            return true;
        }
        </script>
    </div>

    <!-- footer section starts -->
    <footer class="footer">
        <div class="credit">&copy;No copyright @2024 by 
            <span>NgoHuyen</span> | all rights reserved!</div>
    </footer>
    <!-- footer section ends -->
</body>
</html>
