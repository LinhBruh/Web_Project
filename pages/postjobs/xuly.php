<?php
    include('C:\xampp\htdocs\JobSearch\admincp\configs\config.php');
    
    $tencty =$_POST['companyName'];
    $addrcty = $_POST['companyAddress'];
    $mota  = $_POST['companyDescription'];
    $email = $_POST['companyEmail'];
    $tencv = $_POST['jobTitle'];
    $motacv = $_POST['jobDescription'];
    $yccv = $_POST['jobRequirements'];
    $vitri = $_POST['jobPosition'];
    $luong = $_POST['salary'];
    $kieucv = $_POST['jobType'];
    $tranggthaicv = $_POST['jobStatus'];
    $loaicv = $_POST['jobKind'];

    $hinhanh = $_FILES['companyImage']['name'];
    $hinhanh_tmp = $_FILES['companyImage']['tmp_name'];
    move_uploaded_file($hinhanh_tmp, 'uploads/'.$hinhanh);   

    $suscess =FALSE;

    if(isset($_POST['them'])){
        $count = "SELECT count(*) + 1 as id_pj FROM cong_ty";
        $i = mysqli_query($conn,$count);
        $dem1 = mysqli_fetch_array($i);
        $count2 = "SELECT count(*) + 1 as id_pj FROM cong_viec";
        $j = mysqli_query($conn,$count2);
        $dem2 = mysqli_fetch_array($j);
        

        $query1 = "INSERT INTO cong_ty VALUES('".$dem1['id_pj']."','".$tencty."','".$mota."','".$addrcty."','".$email."','".$hinhanh."')";

        $query_check = "SELECT count(*) as tontai FROM danh_muc WHERE tenDanhMuc = '".$loaicv."'";
        $check = mysqli_query($conn,$query_check);
        $check1 = mysqli_fetch_array($check);
        if($check1['tontai'] == 0 ){
            $query3 = "INSERT INTO danh_muc VALUES('".$dem3['id_pj']."','".$loaicv."')";
            $count3 = "SELECT count(*) as id_pj FROM danh_muc";
            mysqli_query($conn,$query3);
            
        }
        else{
            $count3 = "SELECT maDanhMuc as id_pj FROM danh_muc WHERE tenDanhMuc = '".$loaicv."'";
        }
        $t = mysqli_query($conn, $count3);
        $dem3 = mysqli_fetch_array($t);

        
        $query2 = "INSERT INTO cong_viec VALUES('".$dem2['id_pj']."','".$dem3['id_pj']."','".$tencv."','".$mota."','".$yccv."','".$vitri."','".$luong."','".$kieucv."',NOW(),'".$tranggthaicv."')";
        $query4 = "INSERT INTO congty_congviec(maCongTy,maCongViec) VALUE('".$dem1['id_pj']."','".$dem2['id_pj']."')";
        mysqli_query($conn,$query1);
        mysqli_query($conn,$query2);
        mysqli_query($conn,$query4);
        header("Location: ../../index.php?action=index&id=1");
        $suscess = TRUE;
    }

     

?>