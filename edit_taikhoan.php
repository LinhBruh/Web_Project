<?php
// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_web";

// Kết nối đến cơ sở dữ liệu MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Bắt đầu session để kiểm tra người dùng đã đăng nhập hay chưa
session_start();

// Kiểm tra người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['user_id'])) {
    echo "Vui lòng đăng nhập để cập nhật thông tin!";
    exit;
}

// Lấy ID người dùng từ session
$user_id = $_SESSION['user_id'];  

// Lấy thông tin người dùng từ cơ sở dữ liệu
$sql = "SELECT * FROM tai_khoan WHERE maTaiKhoan = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "Không tìm thấy thông tin người dùng.";
    exit;
}

// Cập nhật thông tin người dùng khi người dùng gửi form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hoTen = $_POST['hoTen'];
    $diaChi = $_POST['diaChi'];
    $dienThoai = $_POST['dienThoai'];
    $email = $_POST['email'];
    $matKhau = $_POST['matKhau'];
    $matKhauCu = $_POST['matKhauCu'];

    // Kiểm tra mật khẩu cũ
    if (!empty($matKhauCu)) {
        if (password_verify($matKhauCu, $user['matKhau'])) {
            // Mã hóa mật khẩu mới nếu có thay đổi
            if (!empty($matKhau)) {
                $matKhau = password_hash($matKhau, PASSWORD_DEFAULT);
                $sql_update = "UPDATE tai_khoan SET hoTen='$hoTen', diaChi='$diaChi', dienThoai='$dienThoai', email='$email', matKhau='$matKhau' WHERE maTaiKhoan=$user_id";
            } else {
                $sql_update = "UPDATE tai_khoan SET hoTen='$hoTen', diaChi='$diaChi', dienThoai='$dienThoai', email='$email' WHERE maTaiKhoan=$user_id";
            }
        } else {
            echo "<script>alert('Mật khẩu cũ không chính xác!');</script>";
            
            exit;
        }
    } else {
        // Cập nhật thông tin mà không thay đổi mật khẩu
        $sql_update = "UPDATE tai_khoan SET hoTen='$hoTen', diaChi='$diaChi', dienThoai='$dienThoai', email='$email' WHERE maTaiKhoan=$user_id";
    }

    // Thực thi câu lệnh SQL để cập nhật thông tin
    if ($conn->query($sql_update) === TRUE) {
        echo "<script>alert('Cập nhật thông tin thành công!'); window.location.href = 'account.php';</script>";
    } else {
        echo "Lỗi cập nhật: " . $conn->error;
    }
}

// Đóng kết nối
$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật thông tin cá nhân</title>
    <link rel="stylesheet" href="css\style.css" type = "text/css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            font-size: 14px;
            color: #555;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: rgb(5, 90, 90);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: rgb(3, 70, 70);
        }
        .show-password {
            display: flex;
            align-items: center;
        }
        .show-password input {
            width: auto;
            margin-right: 5px;
        }
        .error {
            color: red;
            font-size: 12px;
        }
    </style>
</head>
<body>
<?php include 'pages/homes/header.php'; ?> 
    <div class="container">
        <h2>Cập nhật thông tin cá nhân</h2>
        <form method="POST" action="" onsubmit="return validatePassword();">
            <label for="hoTen">Họ tên:</label>
            <input type="text" id="hoTen" name="hoTen" value="<?php echo $user['hoTen']; ?>" required><br>

            <label for="diaChi">Địa chỉ:</label>
            <input type="text" id="diaChi" name="diaChi" value="<?php echo $user['diaChi']; ?>"><br>

            <label for="dienThoai">Số điện thoại:</label>
            <input type="text" id="dienThoai" name="dienThoai" value="<?php echo $user['dienThoai']; ?>"><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required><br>

            <label for="matKhauCu">Mật khẩu cũ:</label>
            <input type="password" id="matKhauCu" name="matKhauCu" placeholder="Nhập mật khẩu cũ"><br>

            <label for="matKhau">Mật khẩu mới:</label>
            <input type="password" id="matKhau" name="matKhau" placeholder="Nhập mật khẩu mới"><br>
            <div id="passwordError" class="error"></div>

            <div class="show-password">
                <input type="checkbox" id="showMatKhauCu" onclick="togglePassword('matKhauCu')">
                <label for="showMatKhauCu">Hiện mật khẩu cũ</label>
            </div>

            <div class="show-password">
                <input type="checkbox" id="showMatKhau" onclick="togglePassword('matKhau')">
                <label for="showMatKhau">Hiện mật khẩu mới</label>
            </div>

            <input type="submit" value="Cập nhật">
        </form>
    </div>

    <script>
    function validatePassword() {
        const password = document.getElementById('matKhau').value;
        const errorDiv = document.getElementById('passwordError');

        const minLength = 8;
        const hasUpperCase = /[A-Z]/.test(password);
        const hasNumber = /[0-9]/.test(password);
        const hasSpecialChar = /[!@#$%^&*(),.?":{}|<>]/.test(password);

        if (password.length > 0 && (password.length < minLength || !hasUpperCase || !hasNumber || !hasSpecialChar)) {
            errorDiv.textContent = 'Mật khẩu phải có ít nhất 8 ký tự, bao gồm chữ hoa, số và ký tự đặc biệt.';
            return false;
        }
        errorDiv.textContent = '';
        return true;
    }

    function togglePassword(id) {
        const field = document.getElementById(id);
        field.type = field.type === "password" ? "text" : "password";
    }
    </script>
</body>
</html>
