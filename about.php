<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>

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
                <a href="index.php?action=index&id=1">Home</a>
                <a href="about.php">About Us</a>
                <a href="pages/alljobs/jobs.php">All Jobs</a>
                <a href="contact.php">Contact Us</a>
                <a href="login.php">Account</a>
            </nav>

            <a href="postjob.php" class="btn" style="margin-top: 0;">Post Job</a>
        </section>
     </header>
    <!-- header section ends -->

    <!-- about us section starts -->
     <div class="section-title">About us</div>
     <section class="about">
        <img src="images/aboutus.jpg" alt="">
        <div class="box">
            <h3>why choose us?</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Quas delectus dolorem, sunt aliquam quam incidunt ut nobis eveniet eum dolorum.
                Odit vitae ducimus possimus, 
                culpa doloribus explicabo sint autem expedita.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                Optio eum eligendi ea ducimus eos et dignissimos harum, 
                ex illo temporibus aut cupiditate quod, id, 
                saepe sapiente perspiciatis labore nulla sequi?</p>
            <a href="contact.html" class="btn">contact us</a>
        </div>
     </section>
    <!-- about us section ends -->

    <!-- reviews section starts -->
     <div class="section-title">top reviews</div>
     <section class="reviews">
        <div class="box-container">
            <div class="box">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3 class="title">amazing results</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                    Iste obcaecati veniam ab accusamus dolores unde deleniti eligendi quia id voluptas 
                    repudiandae aperiam tempora minus quis commodi exercitationem eveniet, 
                    optio architecto!</p>
                <div class="user">
                    <img src="images/icon-1.jpg" alt="">
                    <div>
                        <h3>Nguyen Van A</h3>
                        <span>Web designer</span>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3 class="title">good choice</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                    Iste obcaecati veniam ab accusamus dolores unde deleniti eligendi quia id voluptas 
                    repudiandae aperiam tempora minus quis commodi exercitationem eveniet, 
                    optio architecto!</p>
                <div class="user">
                    <img src="images/icon-1.jpg" alt="">
                    <div>
                        <h3>Tran Van B</h3>
                        <span>Developer</span>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3 class="title">Nice</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                    Iste obcaecati veniam ab accusamus dolores unde deleniti eligendi quia id voluptas 
                    repudiandae aperiam tempora minus quis commodi exercitationem eveniet, 
                    optio architecto!</p>
                <div class="user">
                    <img src="images/icon-1.jpg" alt="">
                    <div>
                        <h3>Le Van C</h3>
                        <span>Engineers</span>
                    </div>
                </div>
            </div>
        </div>
     </section>
    <!-- reviews section starts -->

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