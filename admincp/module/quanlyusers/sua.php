
<?php
    $sql_sua_select = "SELECT * FROM tai_khoan WHERE maTaiKhoan = $_GET[iduser] LIMIT 1";
    $row_sua_select = mysqli_query($conn,$sql_sua_select);
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

<h1 style = "text-align:center; padding:10px 20px;">Tài khoản user cần sửa</h1>
<table style = " border: solid 1px black; border-collapse : collapse; width: 100%">
    <form method = "POST" action = "module/quanlyusers/xuly.php?iduser=<?php echo $_GET['iduser']?>">
        <thead>
            <tr>
                <th>ID</th>
                <th>Họ và Tên</th>
                <th>Địa chỉ</th>
                <th>Điện thoại</th>
                <th>Email</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                    while($row = mysqli_fetch_array($row_sua_select)){   
                ?>
                    <tr>
                        <td><?php echo $row['maTaiKhoan'] ?></td>
                        <td><?php echo $row['hoTen']?></td>
                        <td><?php echo $row['diaChi']?></td>
                        <td><?php echo $row['dienThoai']?></td>
                        <td><?php echo $row['email']?></td>
                        <td><?php echo $row['trangThai']?></td>
                    </tr>
                    <tr>
                        <td>Nhập chỉnh sửa</td>
                        <td><input type="text" name = "hoten" id ="hoten" placeholder = "Nhập họ tên"></td>
                        <td><input type="text" name = "diachi" id ="diachi" placeholder = "Nhập địa chỉ"></td>
                        <td><input type="text" name= "dienthoai" id ="dienthoai" placeholder = "Nhập số điên thoại"></td>
                        <td><input type="text" name = "email" id ="email" placeholder = "Nhập email"></td>
                        <td><input type="text" name = "trangthai" id ="trangthai" placeholder = "Nhập trạng thái"></td>
                    </tr>
                    <tr>
                        <td colspan = 2><input type="submit" name="sua" id="sua" value = "Sửa thông tin user"></td>
                    </tr>
                <?php
                    }
                ?>   
            <!-- Thêm các hàng khác tại đây -->
        </tbody>
    </table>
</form>
</div>