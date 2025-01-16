<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- Custom CSS file link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- (Đã note rõ 'starts' và 'ends') Các phần khác có thể sửa còn Phần footer và header nếu sửa thì hỏi Bắc nhé không lại lỗi hết lên đó -->
    <!-- header section starts -->
     <header class="header">
        <section class="flex">
            <!-- <div id="menu-btn" class="fas fa-bars-staggered"></div> -->
            <a href="index.php" class="Logo"><i class="fas fa-briefcase"></i> Jobs</a>
            <nav class="navbar">
                <a href="index.php?action=index&id=1">Home</a> <!--Trang chủ -->
                <a href="about.php">About Us</a> <!-- Giới thiệu trang, sử thành chức năng của mình thì sửa tên và code trong trang About.html nhé <3 -->
                <a href="pages/alljobs/jobs.php">All Jobs</a> <!-- Xem danh sách công việc theo danh mục -->
                <a href="#">Contact Us</a>
                

                <?php if (!empty($_SESSION['user_id'])): ?>
                <!-- Hiển thị menu cho người dùng đã đăng nhập -->
                <a href="edit_taikhoan.php">Tài khoản</a>
                <a href="create_profile.php">Tạo CV</a>
                <a href="view_profile.php">Xem Hồ Sơ</a>
                <a href="registered_jobs.php">Danh sách công việc đã đăng ký</a>
                <a href="logout.php">Đăng xuất</a>
                
                <?php else: ?>
                <!-- Hiển thị menu cho khách chưa đăng nhập -->
                <a href="register.php">Đăng ký</a>
                <a href="login.php">Đăng nhập</a>
            <?php endif; ?>







            </nav>

            <a href="postjob.php" class="btn" style="margin-top: 0;">Post Job</a>
        </section>
     </header>
     <?php
        include("admincp/configs/config.php");        
        include("pages/homes/search.php");
        include("pages/homes/categories.php");
        if(isset($_GET['action'])){
            $tam = $_GET['action'];
        }
        else{
            $tam ='';
        }
        if($tam == 'index'){
        include("pages/homes/content.php");

        }
        elseif($tam == 'timkiem'){
            include("pages/timkem/content.php");
        }
        include("pages/homes/footer.php");
    ?>
    <!-- Custom js file link-->
    <script src="script.js"></script>
    <!-- <script>
        let dropdown_items = document.querySelectorAll('.job-filter form .dropdown-container .dropdown .lists .items');
        dropdown_items.forEach(items => {
            items.onclick = () => {
                items_parent = items.parentElement.parentElement;
                let output = items_parent.querySelector('.output');
                output.value = items.innerText; 
            }
        })
    </script> -->
</body>
</html>