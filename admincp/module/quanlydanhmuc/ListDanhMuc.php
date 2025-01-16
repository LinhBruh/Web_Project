<?php
$query = "SELECT * FROM danh_muc ORDER BY maDanhMuc";
$row_select = mysqli_query($conn,$query);
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
    <h1 style = "text-align:center; padding:10px 20px;">Danh sách Danh Mục</h1>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>ID</th>
                <th>Tên Danh Mục</th>
                <th>Tùy Biến</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $i = 0;
            while($row = mysqli_fetch_array($row_select)) {
                $i++;
        ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['maDanhMuc'] ?></td>
                <td><?php echo $row['tenDanhMuc'] ?></td>
                <td><a href="module/quanlydanhmuc/category_class.php?maDanhMuc=<?php echo $row['maDanhMuc']?>">Xóa</a> | <a href="index.php?action=quanlidanhmuc&query=sua&maDanhMuc=<?php echo $row['maDanhMuc']?>">Sửa</a></td>
            </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>