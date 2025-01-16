<?php
    $sql_select = "SELECT * FROM tai_khoan Order by maTaiKhoan";
    $row_select = mysqli_query($conn,$sql_select);
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
<h1 style = "text-align:center; padding:10px 20px;">Danh sách tài khoản user</h1>
    <table style = " border: solid 1px black; border-collapse : collapse; width: 100%">
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
                    $i = 0;
                    while($row = mysqli_fetch_array($row_select)){
                        $i++;
                ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row['hoTen']?></td>
                        <td><?php echo $row['diaChi']?></td>
                        <td><?php echo $row['dienThoai']?></td>
                        <td><?php echo $row['email']?></td>
                        <td><?php echo $row['trangThai']?></td>
                        <td>
                            <a href="module/quanlyusers/xuly.php?iduser=<?php echo $row['maTaiKhoan']?>">Xóa</a> | <a href="index.php?action=quanliusers&query=sua&iduser=<?php echo $row['maTaiKhoan']?>">Sửa</a>
                        </td>
                    </tr>
                <?php
                    }
                ?>   
            <!-- Thêm các hàng khác tại đây -->
        </tbody>
    </table>

</div>
