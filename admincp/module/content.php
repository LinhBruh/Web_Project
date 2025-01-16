<div class ="clear"></div>
<div class = "main">
    <?php
        if(isset($_GET['action']) && $_GET['query']){
            $tam = $_GET['action'];
            $query = $_GET['query'];
        }
        else{
            $tam = '';
            $query = '';
        }
        if($tam=='quanliusers' && $query == 'them'){
            include("module/quanlyusers/them.php");
            include("module/quanlyusers/lietke.php");
        }
        elseif($tam=='quanliusers' && $query == 'sua'){
            include("module/quanlyusers/sua.php");
        }
        else{
            include("dashboard.php");
        }
        if($tam=='quanlipost' && $query == 'them'){
            include("module/quanlypost/AddCongViec.php");
            include("module/quanlypost/ListCongViec.php");
        }
        elseif($tam=='quanlipost' && $query == 'sua'){
            include("module/quanlypost/EditCongViec.php");
        }
        else{
            include("dashboard.php");
        }
        if($tam=='quanlidanhmuc' && $query == 'them'){
            include("module/quanlydanhmuc/AddDanhMuc.php");
            include("module/quanlydanhmuc/ListDanhMuc.php");
        }
        elseif($tam=='quanlidanhmuc' && $query == 'sua'){
            include("module/quanlydanhmuc/EditDanhMuc.php");
        }
        else{
            include("dashboard.php");
        }
    ?>
</div>
