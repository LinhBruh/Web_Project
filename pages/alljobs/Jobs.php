<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Jobs</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../../css/style.css">

    <style>
        .jobs-container .box-container .box .tags p {
            padding: 1rem;
            border-radius: .5rem;
            background-color: var(--light-bg);
            font-size: 1.5rem;
            color: var(--light-color);
        }
        .job-filter form {
            background-color: var(--white);
            box-shadow: var(--box-shadow);
            border: var(--border);
            border-radius: .5rem;
            padding: 2rem;
        }
        .job-filter .heading {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .job-filter form .dropdown-container {
            display: flex;
            justify-content: space-between;
            gap: 15px;
        }

        .job-filter form .dropdown-container .dropdown {
            flex: 1;
        }

        .job-filter form .dropdown-container .dropdown label p{
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 10px;
            color: var(--black);
        }

        .job-filter form .dropdown-container .dropdown select {
            padding: 10px;
            border: var(--border);
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
            width: 100%;
        }

        .job-filter form .dropdown-container .dropdown select:focus {
            border-color: var(--black);
            outline: none;
        }

        .job-filter form .input-container {
            text-align: center;
            margin-top: 10px;
        }

        .job-filter form .input-container input[type="submit"] {
            background-color: var(--light-bg);
            color: var(--black);
            border: none;
            padding: 10px 30px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 15px;
        }

        .job-filter form .input-container input[type="submit"]:hover {
            background-color: var(--main-color);
            color: var(--white);
        }
        .btn-add {
    background-color: #28a745;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}
.btn-add:hover {
    background-color: #218838;
}

    </style>
</head>
<body>
    <!-- (Đã note rõ 'starts' và 'ends') Các phần khác có thể sửa còn Phần footer và header nếu sửa thì hỏi Bắc nhé không lại lỗi hết lên đó -->
    <?php
        $db_server = "localhost";
        $db_user = "root";
        $db_pass = "";
        $db_name = "project_web";

        $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
        
        if(!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } 

        $sort_order = isset($_POST['sort-order']) ? $_POST['sort-order'] : '0';
        $job_type = isset($_POST['sort-by-type']) ? $_POST['sort-by-type'] : '0';
        $job_status = isset($_POST['sort-by-status']) ? $_POST['sort-by-status'] : '0';
        $limit = 10;

        $sql = "SELECT * FROM cong_viec WHERE 1=1";

        // Xác định câu lệnh SQL dựa trên lựa chọn
        if ($job_type != '0') {
            $sql .= " AND kieuCongViec = '" . mysqli_real_escape_string($conn, $job_type) . "'";
        }

        if ($job_status != '0') {
            $sql .= " AND trangThai = '" . mysqli_real_escape_string($conn, $job_status) . "'";
        }

        if ($sort_order == 'asc') {
            $sql .= " ORDER BY luong ASC";
        } elseif ($sort_order == 'desc') {
            $sql .= " ORDER BY luong DESC";
        } else {
            $sql .= " LIMIT $limit";
        }
        

        $result = mysqli_query($conn, $sql);     
    ?>
    <!-- header section starts -->
    <header class="header">
        <section class="flex">
            <!-- <div id="menu-btn" class="fas fa-bars-staggered"></div> -->
            <a href="#" class="Logo"><i class="fas fa-briefcase"></i> Jobs</a>
            <nav class="navbar">
                <a href="../../index.php?action=index&id=1">Home</a>
                <a href="../../about.php">About Us</a>
                <a href="jobs.php">All Jobs</a>
                <a href="../../contact.php">Contact Us</a>
                <a href="../../login.php">Account</a>
            </nav>

            <a href="../../postjob.php" class="btn" style="margin-top: 0;">Post Job</a>
        </section>
     </header>
    <!-- header section ends -->
    <!-- Job filter section starts -->
    <section class="job-filter">
        <h1 class="heading">filter jobs</h1>
        <form action="" method="post">
            <!-- <div class="flex">
                <div class="box">
                    <p>job title <span>*</span></p>
                    <input type="text" name="title" placeholder="keyword, category or company" required maxlength="20" class="input">
                </div>
                <div class="box">
                    <p>job location</p>
                    <input type="text" name="location" placeholder="city, state or country" required maxlength="50" class="input">
                </div>
            </div> -->
            <div class="dropdown-container">
                <!-- Xem theo danh kiểu công việc  -->
                <div class="dropdown">
                    <label for="sort-by-type"><p>Lọc theo hình thức:</p> </label>
                    <select name="sort-by-type" id="sort-by-type">
                        <option value="0">--Hình thức--</option>
                        <option value="Full-Time">Full-Time</option>
                        <option value="Part-Time">Part-Time</option>
                        <option value="Freelancer">Freelancer</option>
                        <option value="Fresher">Fresher</option>
                        <option value="Intership">Internship</option>
                    </select>
                </div>
                <!-- Xem theo trạng thái -->
                <div class="dropdown">
                    <label for="sort-by-status"><p>Lọc theo trạng thái:</p> </label>
                    <select name="sort-by-status" id="sort-by-status">
                        <option value="0">--Trạng thái--</option>
                        <option value="active">Đang tuyển</option>
                        <option value="inactive">Chờ mở ứng tuyển</option>
                    </select>
                </div>
                <!-- Xem theo sắp xếp lương -->
                <div class="dropdown">
                    <label for="sort-order"><p>Sắp theo mức lương:</p> </label>
                    <select name="sort-order" id="sort-order">
                        <option value="0">--Sắp xếp theo mức lương--</option>
                        <option value="asc">Mức lương tăng dần</option>
                        <option value="desc">Mức lương giảm dần</option>
                    </select>
                </div>
            </div>
            <div class="input-container">
                <input type="submit" value="LỌC">
            </div>
        </form>
     </section>
    <!-- Job filter section ends -->

    <!-- All jobs section starts -->
    <section class="jobs-container">
    <h1 class="heading">All jobs</h1>
    <div class="box-container">
        <?php 
            while($row = mysqli_fetch_assoc($result)) {
        ?>
               <div class="box">
                    <div class="company">
                        <img src="../../images/icon-1.jpg" alt="">
                        <div>
                            
                            <h3><?php echo $row['tenCongViec'] ?></h3>
                            <span>
                                <?php $date =  new DateTime($row['ngayDang']);
                                $date = $date->format('d/m/Y');
                                echo $date;?>
                            </span>
                        </div>
                    </div>
                    <h3 class="job-title"><?php echo $row['viTri']?></h3>
                    <p class="location"><i class="fas fa-map-marker-alt"></i> 
                        <span>Hà Nội, Việt Nam</span></p>
                    <div class="tags">
                        <p><i class="fas fa-dollar-sign"></i> <span><?php echo $row['luong']?></span></p>
                        <p><i class="fas fa-briefcase"></i> <span><?php echo $row['kieuCongViec'] ?></span></p>
                        <p><i class="fas fa-clock"></i> <span>All day</span></p>
                    </div>
                    <div class="flex-btn">
                        <a href="view_job.html" class="btn">view details</a>
                        <button type="submit" class="far fa-heart" name="save"></button>
                        <a href="../../add_jobs.php?maCongViec=<?php echo $row['maCongViec']; ?>" class="btn btn-add">Add</a>
                    </div>
                </div>
        <?php
            }
        ?>
    </div>
    <div class="load-more-container" style="text-align: center; margin-top: 20px;">
        <button id="load-more" class="btn">Xem thêm</button>
    </div>
</section>

    <!-- All jobs section ends -->

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
    </script> hiển thị ra lựa chọn theo bộ lọc -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        let offset = 10; // Bắt đầu từ công việc thứ 11

        $('#load-more').on('click', function() {
            $.ajax({
                url: 'loadMoreJobs.php', // Tạo một tệp PHP để xử lý việc tải thêm công việc
                type: 'POST',
                data: { offset: offset },
                success: function(data) {
                    if (data) {
                        $('.box-container').append(data); // Thêm công việc mới vào container
                        offset += 10; // Tăng offset để tải thêm 10 công việc tiếp theo
                    } else {
                        $('#load-more').hide(); // Ẩn nút nếu không còn công việc nào để tải
                    }
                }
            });
        });
    </script>
</body>
</html>