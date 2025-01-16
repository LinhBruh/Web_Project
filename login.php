<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                <a href="edit_taikhoan.php">Tài khoản</a>
                <a href="create_profile.php">Tạo CV</a>
            </nav>
            <a href="postjob.php" class="btn" style="margin-top: 0;">Post Job</a>
        </section>
    </header>

    <!-- PHP xử lý đăng nhập -->
    <?php
    session_start();
    include("config.php"); // Kết nối cơ sở dữ liệu

    $errorMessage = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
        $matKhau = trim($_POST['matKhau']); // Không cần escape vì không đưa vào SQL

        // Kiểm tra xem email có tồn tại trong cơ sở dữ liệu không
        $query = "SELECT * FROM tai_khoan WHERE email = '$email'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            // Kiểm tra mật khẩu (mã hóa)
            if (password_verify($matKhau, $row['matKhau'])) {
                // Đăng nhập thành công
                $_SESSION['user_id'] = $row['maTaiKhoan'];
                $_SESSION['user_email'] = $email;
                $_SESSION['user_name'] = $row['hoTen']; // Giả sử có cột 'hoTen'
                header("Location: index.php?action=index&id=1"); // Chuyển hướng đến trang chính
                exit();
            } else {
                $errorMessage = "Sai mật khẩu! Vui lòng thử lại.";
            }
        } else {
            $errorMessage = "Email không tồn tại! Vui lòng đăng ký.";
        }
    }
    ?>

    <!-- Nội dung -->
    <div class="noidung">
        <form action="" method="POST">
            <h2>Đăng nhập ngay</h2>
            <br><br>
            <?php if (!empty($errorMessage)) { echo "<p style='color: red;'>$errorMessage</p>"; } ?>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Email" required>

            <label for="matKhau">Mật khẩu:</label>
            <div style="position: relative; display: inline-block;">
                <input type="password" id="matKhau" name="matKhau" placeholder="Mật khẩu"  required>
                <div class="checkbox-container">
                    <input type="checkbox" id="showPassword" onclick="togglePasswordVisibility()">
                    <label for="showPassword">Hiện mật khẩu</label>
                </div>
            </div>
            <br><br>
            <button type="submit" class="btn">Đăng nhập</button>
            <br><br>
            <p class="hihi">Bạn chưa có tài khoản? <a href="register.php">Đăng ký</a> ngay</p>
        </form>
    </div>

    <script>
    // Tính năng ẩn/hiện mật khẩu
    function togglePasswordVisibility() {
        var passwordField = document.getElementById("matKhau");
        var showPassword = document.getElementById("showPassword").checked;

        passwordField.type = showPassword ? "text" : "password";
    }
    </script>

    <!-- footer section starts -->
    <footer class="footer">
        <div class="credit">&copy;No copyright @2024 by 
            <span>NgoHuyen</span> | all rights reserved!</div>
    </footer>
    <!-- footer section ends -->
</body>
</html>
