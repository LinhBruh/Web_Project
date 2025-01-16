<?php
    include('../../configs/config.php');

    if(isset($_POST['them'])){
        ///thêm
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $maDanhMuc = $_POST['maDanhMuc'];
            $tenCongViec = $_POST['tenCongViec'];
            $moTa = $_POST['moTa'];
            $yeuCau = $_POST['yeuCau'];
            $viTri = $_POST['viTri'];
            $luong = $_POST['luong'];
            $kieuCongViec = $_POST['kieuCongViec'];
            $ngayDang = $_POST['ngayDang'];
            $trangThai = $_POST['trangThai'];
            $query = "INSERT INTO cong_viec(maDanhMuc, tenCongViec, moTa, yeuCau, viTri, luong, kieuCongViec, ngayDang, trangThai) 
                VALUES ('".$maDanhMuc."', '".$tenCongViec."', '".$moTa."', '".$yeuCau."', '".$viTri."', '".$luong."', '".$kieuCongViec."', '".$ngayDang."' ,'".$trangThai."')";
            mysqli_query($conn,$query);
            header('Location:../../index.php?action=quanlipost&query=them'); 
        }
    }
    elseif (isset($_POST['sua'])) {
        ///sửa
        $yeuCau = $_POST['yeuCau'];
        $viTri = $_POST['viTri'];
        $trangThai = $_POST['trangThai'];
        $query = "UPDATE cong_viec SET yeuCau = '".$yeuCau."', viTri = '".$viTri."', trangThai = '".$trangThai."' WHERE maCongViec = '$_GET[maCongViec]'";
        mysqli_query($conn,$query);
        header('Location:../../index.php?action=quanliposts&query=them'); 
    }
    else{
        ///xóa
        $maCongViec = $_GET['maCongViec'];
        $query = "DELETE FROM cong_viec WHERE maCongViec = '".$maCongViec."'";
        mysqli_query($conn,$query);
        header('Location:../../index.php?action=quanlipost&query=them'); 
    }
    // public function show_job() {
    //     $query = "SELECT * FROM cong_viec ORDER BY maCongViec DESC";
    //     $result = $this -> db -> select($query);
    //     return $result;
    // }

    // public function show_category() {
    //     $query = "SELECT * FROM danh_muc ORDER BY maDanhMuc DESC";
    //     $result = $this -> db -> select($query);
    //     return $result;
    // }

    // public function show_category_by_id($maDanhMuc) {
    //     $query = "SELECT tenDanhMuc FROM danh_muc WHERE maDanhMuc = '$maDanhMuc'";
    //     $result = $this -> db -> select($query);
    //     return $result;
    // }

    // public function get_job($maCongViec) {
    //     $query = "SELECT * FROM cong_viec WHERE maCongViec = '$maCongViec'";
    //     $result = $this -> db -> select($query);
    //     return $result;
    // }
?>