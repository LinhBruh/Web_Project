<?php
    $sql_select = "SELECT maDanhMuc,tenDanhMuc FROM danh_muc Order by maDanhMuc";
    $row_select = mysqli_query($conn,$sql_select);
    
?>
<section class="category">
        <h1 class="heading">Job Categories</h1>
        <div class="box-container">
            <?php
                while($row  = mysqli_fetch_array($row_select)){
                        
            ?>
            <a href="index.php?action=index&id=<?php echo $row['maDanhMuc'] ?>" class="box">
                <i class="fas fa-code"></i>
                <div>
                    <h3><?php echo $row['tenDanhMuc'] ?></h3>
                    <span>Hot job</span>
                </div>
            </a>
            <?php
                }
            ?>
        </div>
    </section>