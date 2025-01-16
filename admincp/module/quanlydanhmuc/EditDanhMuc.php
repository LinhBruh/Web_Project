<?php 
    $query = "SELECT * FROM danh_muc WHERE maDanhMuc = $_GET[maDanhMuc] LIMIT 1";
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
<h1 style = "text-align:center; padding:10px 20px;">Sửa Tên Danh Mục</h1>
    <table style = " border: solid 1px black; border-collapse : collapse; width: 100%">
        <form method = "POST" action = "module/quanlydanhmuc/category_class.php?maDanhMuc=<?php echo $_GET['maDanhMuc']?>">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Danh Mục</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row = mysqli_fetch_array($row_sua_select)){   
                ?>
                <tr>
                    <td><?php echo $row['maDanhMuc']?></td>
                    <td><?php echo $row['tenDanhMuc']?></td>
                </tr>
                <tr>
                    <td>Nhập chỉnh sửa</td>
                    <td><input type="text" name = "tenDanhMuc" id ="tenDanhMuc" placeholder = "Nhập tên Danh Mục"></td>
                </tr>
                <tr>
                    <td colspan = 2><input type="submit" name="sua" id="sua" value = "Sửa thông tin danh mục"></td>
                </tr>
                <?php
                    }
                ?>   
            </tbody>
        </table>
    </form>
</div>