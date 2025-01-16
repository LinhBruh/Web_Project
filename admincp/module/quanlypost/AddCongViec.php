<?php
    $select_danhmuc = "SELECT * FROM danh_muc ORDER BY maDanhMuc DESC";
    $row_danhmuc_select = mysqli_query($conn, $select_danhmuc);
?>
<style>
    .them form {
    background-color: #fff;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    margin-bottom: 20px;
    }
    .them .selected, .inputed {
        display: flex;
        justify-content: space-between;
        margin: 15px 0px;
    }
</style>
<div class="them">
    <form action="module/quanlypost/job_class.php" method="POST">
        <h2>Nhập thông tin công việc</h2>
            <label for="maDanhMuc">Chọn Danh Mục: </label>
            <select name="maDanhMuc" id="" style="border: 1px solid #ccc; padding: 8px 25px">
                <option value="#">--Chọn Danh Mục--</option>
                <?php
                while($row = mysqli_fetch_array($row_danhmuc_select)) {         
                ?>
                    <option value="<?php echo $row['maDanhMuc'] ?>"><?php echo $row['tenDanhMuc'] ?></option>    
                <?php
                }
                ?>
            </select>
            <br>
            <label>Tên Công Việc: </label>
            <input type="text" name="tenCongViec" placeholder="Ex: Web Designer" required maxlength="50"> <!-- Nhập tên công việc-->
            <br>
            <label>Mô Tả Công Việc: </label>
            <textarea name="moTa" placeholder="Ex: phát triển, bảo trì, cập nhật website, ..." required cols="219" rows="10" , style="border: 1px solid #ccc; margin-bottom: 15px;"></textarea> <!-- Nhập mô tả công việc-->
            
            <label>Yêu Cầu: </label>
            <textarea name="yeuCau" placeholder="Ex: Đã tốt nghiệp, Sinh viên năm 3 trở lên , GPA CTDL&GT > 3.4..." required cols="219" rows="10" , style="border: 1px solid #ccc; margin-bottom: 15px;"></textarea> <!-- Nhập yêu cầu công việc-->
            
            <div class="inputed">
                <label>Vị Trí Công Việc: </label>
                <input type="text" name="viTri" placeholder="Ex: Intern, Senior,..." required maxlength="50" style="width: 40%;"> <!-- Nhập vị trí công việc-->
                
                <label>Lương: </label>
                <input type="number" name="luong" placeholder="Ex: 1000 (đơn vị $)" required maxlength="50" style="border: 1px solid #ccc; width: 45%; height: 35px; padding: 5px "> <!-- Nhập lương-->
            </div>
            
            <div class="selected">
                <label>Hình Thức: </label>
                    <select name="kieuCongViec" id="" style="border: 1px solid #ccc; padding: 10px 130px">
                        <option value="#">--Chọn hình thức--</option>
                        <option value="Full-Time">Full-Time</option>
                        <option value="Part-Time">Part-Time</option>
                        <option value="Freelancer">Freelancer</option>
                        <option value="Fresher">Fresher</option>
                        <option value="Intership">Intership</option>
                    </select>
                <label>Trạng thái: </label>
                    <select name="trangThai" id="" style="border: 1px solid #ccc; padding: 10px 130px">
                        <option value="#">--Chọn trạng thái--</option>
                        <option value="Đang Tuyển">Đang tuyển</option>
                        <option value="Chờ mở ứng tuyển">Chờ mở ứng tuyển</option>
                    </select>
                <label>Ngày đăng: </label>
                <input type="date" name="ngayDang" required maxlength="50" style="border: 1px solid #ccc; padding: 10px 130px"> <!-- Nhập ngày đăng công việc-->
            </div>
            <br><br>
            <input type="submit" value="Thêm" name="them">
        </form>
</div>