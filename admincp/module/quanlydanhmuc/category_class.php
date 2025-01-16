<?php
    include('../../configs/config.php');

    if(isset($_POST['them'])) {
        $tenDanhMuc = $_POST['tenDanhMuc'];
        $query = "INSERT INTO danh_muc(tenDanhMuc) VALUES ('".$tenDanhMuc."')";
        mysqli_query($conn, $query);
        header('Location:../../index.php?action=quanlidanhmuc&query=them'); 
    }

    elseif(isset($_POST['sua'])) {
        $tenDanhMuc = $_POST['tenDanhMuc'];
        $query = "UPDATE danh_muc SET tenDanhMuc = '".$tenDanhMuc."' WHERE maDanhMuc = $_GET[maDanhMuc]";
        mysqli_query($conn,$query);
        header('Location:../../index.php?action=quanlidanhmuc&query=them'); 
    }

    else {
        $maDanhMuc = $_GET['maDanhMuc'];
        $query = "DELETE FROM danh_muc WHERE maDanhMuc = '".$maDanhMuc."'";
        mysqli_query($conn,$query);
        header('Location:../../index.php?action=quanlidanhmuc&query=them'); 
    }
?>