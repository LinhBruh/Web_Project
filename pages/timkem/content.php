<?php
    $title = $_POST['title'];
    $loaction = $_POST['location'];
    $query = "SELECT * FROM congty_congviec AS c JOIN cong_ty AS cty ON c.maCongTy = cty.maCongTy JOIN cong_viec AS cv ON c.maCongViec = cv.maCongViec WHERE cv.tenCongViec LIKE '%".$title."%' AND cty.diaChi LIKE '%".$loaction."%'";
    $row_select = mysqli_query($conn,$query);
?>
<section class="jobs-container">
        <h1 class="heading">Kết quả cho : <?php echo $title ?>--<?php echo $loaction ?></h1>
        <div class="box-container">
            <?php
                while($row = mysqli_fetch_array($row_select)){
            ?>
            <div class="box">
                <div class="company">
                    <img src="pages/postjobs/uploads/<?php echo $row['hinhAnh'] ?>" alt="">
                    <div>
                        <p><?php echo $row['tenCongTy'];
                                 echo $row['tenCongViec'];?></p>
                        <h3><?php echo $row['tenCongTy'] ?></h3>
                        <span>Từ <?php echo $row['ngayDang']?></span>
                    </div>
                </div>
                <h3 class="job-title"><?php echo $row['tenCongViec']?></h3>
                <p class="location"><i class="fas fa-map-marker-alt"></i>
                    <span><?php echo $row['diaChi'] ?></span></p>
                <div class="tags">
                    <p><i class="fas fa-dollar-sign"></i> <span><?php echo $row['luong'] ?></span></p>
                    <p><i class="fas fa-briefcase"></i> <span><?php echo $row['kieuCongViec']?></span></p>
                    <p><i class="fas fa-clock"></i> <span>day shift</span></p>
                </div>
                <div class="flex-btn">
                    <a href="view_job.php?idcty=<?php echo $row['maCongTy'] ?>&idcv=<? echo $row['maCongViec'] ?>" class="btn">view details</a>
                    <button type="submit" class="far fa-heart" name="save"></button> <!-- Xem chi tiết công việc -->
                </div>
            </div>
            <?php
                }
            ?>
        <div style="text-align: center; margin-top: 2rem;">
            <a href="pages/alljobs/Jobs.php" class="btn">View all</a>
        </div>
     </section>