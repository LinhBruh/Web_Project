
<?php
    include('../../configs/config.php');

    if(isset($_POST['them'])){
        ///thêm
        $id = $_POST['id'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $date = getdate();
        $status = $_POST['status'];
        $sql_them = "INSERT INTO tai_khoan values('".$id."','".$name."','".$address."','".$phone."','".$email."','".$password."','".$date."','".$status."')";
        mysqli_query($conn,$sql_them);
        header('Location:../../index.php?action=quanliusers&query=them'); 
    }
    elseif (isset($_POST['sua'])) {
        ///sửa
        $name = $_POST['hoten'];
        $address = $_POST['diachi'];
        $phone = $_POST['dienthoai'];
        $email = $_POST['email'];
        $status = $_POST['trangthai'];
        $sql_them = "UPDATE tai_khoan SET hoTen = '".$name."',diaChi = '".$address."',dienThoai = '".$phone."',email = '".$email."',trangThai = '".$status."'  WHERE maTaiKhoan = $_GET[iduser]";
        mysqli_query($conn,$sql_them);
        header('Location:../../index.php?action=quanliusers&query=them'); 
    }
    else{
        ///xóa
        $id = $_GET['iduser'];
        $query = "DELETE FROM tai_khoan WHERE maTaiKhoan = '".$id."'";
        mysqli_query($conn,$query);
        header('Location:../../index.php?action=quanliusers&query=them'); 
    }
?>