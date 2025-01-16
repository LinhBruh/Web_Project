<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Jobs</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- (Đã note rõ 'starts' và 'ends') Các phần khác có thể sửa còn Phần footer và header nếu sửa thì hỏi Bắc nhé không lại lỗi hết lên đó -->
    <!-- header section starts -->
    <header class="header">
        <section class="flex">
            <!-- <div id="menu-btn" class="fas fa-bars-staggered"></div> -->
            <a href="index.php?action=index&id=1" class="Logo"><i class="fas fa-briefcase"></i> Jobs</a>
            <nav class="navbar">
                <a href="index.php?action=index&id=1">Home</a>
                <a href="about.php">About Us</a>
                <a href="pages/alljobs/jobs.php">All Jobs</a>
                <a href="#">Contact Us</a>
                <a href="account.php">Account</a>
            </nav>

            <a href="postjob.php" class="btn" style="margin-top: 0;">Post Job</a>
        </section>
     </header>
    <!-- header section ends -->

    <!-- view job section starts -->
     <div class="job-details">
        <h1 class="heading">job details</h1>
        <div class="details">
            <div class="job-info">
                <h3>Senior Web designer</h3>
                <a href="view_company.php">IT infosys co.</a>
                <p><i class="fas fa-map-marker-alt"></i> NewYork, England</p>
            </div>
            <div class="basic-details">
                <h3>Yêu Cầu: </h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                    Ullam dicta cumque rerum? Possimus in dolores culpa explicabo aut consequatur! 
                    Soluta voluptatum amet excepturi natus ipsa reprehenderit cumque doloribus quam deleniti?</p>
                <h3>Vị trí: </h3>
                <p>Nhân viên</p>
                <h3>Lương: </h3>
                <p>2000$ - 10000$ per month</p>
                <h3>Kiểu công việc: </h3>
                <p>Full-time</p>
                <h3>Ngày đăng: </h3>
                <p>10/10/2024</p>
                <h3>Trạng thái: </h3>
                <p>Đang tuyển</p>
            </div>
            <div class="description">
                <h3>Mô tả: </h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Quasi excepturi natus voluptas in placeat magni ab quod laudantium veniam. 
                    Dolorum neque repellat dignissimos. 
                    Eum sint error porro explicabo nam voluptates.</p>
            </div>
            <form action="" method="post" class="flex-btn">
                <input type="submit" value="apply now" name="apply" class="btn">
                <button type="submit" class="save"><i class="far fa-heart"></i> <span>Save Job</span></button>
            </form>
        </div>
     </div>
    <!-- view job section ends -->

    <!-- footer section starts -->
    <footer class="footer">
        <section class="grid">
            <div class="box">
                <h3>Quick links</h3>
                <a href="#"><i class="fas fa-angle-right"></i> Home</a>
                <a href="#"><i class="fas fa-angle-right"></i> About</a>
                <a href="#"><i class="fas fa-angle-right"></i> All Jobs</a>
                <a href="#"><i class="fas fa-angle-right"></i> Contact Us</a>
                <a href="#"><i class="fas fa-angle-right"></i> Filter Search</a>
            </div>
            <div class="box">
                <h3>Extra links</h3>
                <a href="#"><i class="fas fa-angle-right"></i> Account</a>
                <a href="#"><i class="fas fa-angle-right"></i> Login</a>
                <a href="#"><i class="fas fa-angle-right"></i> Register</a>
                <a href="#"><i class="fas fa-angle-right"></i> Post job</a>
                <a href="#"><i class="fas fa-angle-right"></i> Dashboard</a>
            </div>
            <div class="box">
                <h3>Follow us</h3>
                <a href="#"><i class="fab fa-facebook-f"></i> Facebook</a>
                <a href="#"><i class="fab fa-twitter"></i> Twitter</a>
                <a href="#"><i class="fab fa-instagram"></i> Instagram</a>
                <a href="#"><i class="fab fa-linkedin"></i> Linkedin</a>
                <a href="#"><i class="fab fa-youtube"></i> Youtube</a>
            </div>
        </section>

        <div class="credit">&copy;No copyright @2024 by 
            <span>XuanBac</span> | all rights reserved!</div>
     </footer>
    <!-- footer section ends -->
</body>
</html>