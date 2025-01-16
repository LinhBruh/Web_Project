<?php
    $query = "SELECT * FROM cong_viec WHERE maCongViec = $_GET[maCongViec] LIMIT 1";
    $row_sua_select = mysqli_query($conn,$query);
?>
<style>
    table {
        width: 80%;
        border-collapse: collapse;
        margin: 20px auto;
    }
    th, td {
        border: 1px solid #ddd;
        text-align: center;
        padding: 8px;
    }
    th {
        background-color: #f4f4f4;
        font-weight: bold;
    }
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    tr:hover {
         background-color: #f1f1f1;
    }
</style>
<div class = "dansach" style = "border : 1px solid black;">
    <h1 style = "text-align:center; padding:10px 20px;">Chỉnh sửa công việc</h1>
    <table>
        <form action="module/quanlycongviec/job_class.php?maCongViec=<?php echo $_GET['maCongViec']?>" method="POST" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Danh Mục</th>
                <th>Tên C.Việc</th>
                <th>Mô tả</th>
                <th>Yêu Cầu</th>
                <th>Vị Trí</th>
                <th>Lương</th>
                <th>Hình Thức</th>
                <th>Ngày Đăng</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                while($row = mysqli_fetch_array($row_sua_select)) {
            ?>  
                <tr>
                    <td><?php echo $row['maCongViec']?></td>
                    <td>
                        <?php
                            $sql_tenByID = "SELECT tenDanhMuc FROM danh_muc WHERE maDanhMuc = '". $row['maDanhMuc']."'";
                            $tenC = mysqli_query($conn, $sql_tenByID);
                            while ($rel = mysqli_fetch_array($tenC)) {
                                echo $rel['tenDanhMuc'];
                            }
                        ?>
                    </td>
                    <td><?php echo $row['tenCongViec']?></td>
                    <td><?php echo $row['moTa']?></td>
                    <td><?php echo $row['yeuCau']?></td>
                    <td><?php echo $row['viTri']?></td>
                    <td><?php echo $row['luong']?></td>
                    <td><?php echo $row['kieuCongViec']?></td>
                    <td><?php 
                            $date =  new DateTime($row['ngayDang']);
                            $date = $date->format('d/m/Y');
                            echo $date;?></td>
                    <td><?php echo $row['trangThai']?></td>
                </tr>
                <tr>
                    <td>Chỉnh sửa</td>
                    <td>
                        <?php
                            $sql_tenByID = "SELECT tenDanhMuc FROM danh_muc WHERE maDanhMuc = '". $row['maDanhMuc']."'";
                            $tenC = mysqli_query($conn, $sql_tenByID);
                            while ($rel = mysqli_fetch_array($tenC)) {
                                echo $rel['tenDanhMuc'];
                            }
                        ?>
                    </td>
                    <td><?php echo $row['tenCongViec']?></td>
                    <td><?php echo $row['moTa'] ?></td>
                    <td><textarea type="text" name="yeuCau" id="yeuCau" placeholder="Chỉnh sửa"></textarea></td>
                    <td><input type="text" name="viTri" id="viTri" placeholder="Chỉnh sửa"></td>
                    <td><?php echo $row['luong']?></td>
                    <td><?php echo $row['kieuCongViec']?></td>
                    <td><?php 
                            $date =  new DateTime($row['ngayDang']);
                            $date = $date->format('d/m/Y');
                            echo $date;?></td>
                    <td>
                        <select name="trangThai" id="" style="border: 1px solid #ccc; padding: 10px 130px">
                            <option value="#">--Chọn trạng thái--</option>
                            <option value="Đang Tuyển">Đang tuyển</option>
                            <option value="Chờ mở ứng tuyển">Chờ mở ứng tuyển</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan= 10><input type="submit" value="Sửa thông tin Công Việc" name="sua" id="sua" style="background-color: #4CAF50; padding: 10px; color: white"></td>
                </tr>
            <?php      
                }
            ?>
        </tbody>
        </table>
    </form>
</div>
