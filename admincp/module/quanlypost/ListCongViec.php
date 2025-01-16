<?php
    $sql_select = "SELECT * FROM cong_viec ORDER BY maCongViec";
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
<div class="dansach" style = "border : 1px solid black;">
    <h1 style = "text-align:center; padding:10px 20px;">Danh Sách Công Việc</h1>
    <table style = " border: solid 1px black; border-collapse : collapse; width: 90%">
        <thead>
            <tr>
                <th>STT</th>
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
                <th>Tùy Biến</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i=0;
                while($result = mysqli_fetch_array($row_select)) { 
                    $i++;
            ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $result['maCongViec'] ?></td>
                            <td><?php 
                                $maDanhMuc = $result['maDanhMuc'];
                                $getTenDanhMuc = "SELECT tenDanhMuc FROM danh_muc WHERE maDanhMuc = '$maDanhMuc'";
                                $tenDM = mysqli_query($conn, $getTenDanhMuc);
                                $row = mysqli_fetch_array($tenDM);
                                echo $row['tenDanhMuc']?>
                            </td>
                            <td><?php echo $result['tenCongViec'] ?></td>
                            <td><?php echo $result['moTa'] ?></td>
                            <td><?php echo $result['yeuCau'] ?></td>
                            <td><?php echo $result['viTri'] ?></td>
                            <td><?php echo $result['luong'] ?></td>
                            <td><?php echo $result['kieuCongViec'] ?></td>
                            <td><?php 
                            $date =  new DateTime($result['ngayDang']);
                            $date = $date->format('d/m/Y');
                            echo $date;?></td>
                            <td><?php echo $result['trangThai'] ?></td>
                            <td><a href="module/quanlypost/job_class.php?maCongViec=<?php echo $result['maCongViec'] ?>">Xóa</a> | <a href="index.php?action=quanlipost&query=sua&maCongViec=<?php echo $result['maCongViec']?>">Sửa</a></td>
                        </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>
