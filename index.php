<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- Custom CSS file link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- (Đã note rõ 'starts' và 'ends') Các phần khác có thể sửa còn Phần footer và header nếu sửa thì hỏi Bắc nhé không lại lỗi hết lên đó -->
    <?php
        include("admincp/configs/config.php");        
        include("pages/homes/header.php");
        include("pages/homes/search.php");
        include("pages/homes/categories.php");
        if(isset($_GET['action'])){
            $tam = $_GET['action'];
        }
        else{
            $tam ='';
        }
        if($tam == 'index'){
        include("pages/homes/content.php");

        }
        elseif($tam == 'timkiem'){
            include("pages/timkem/content.php");
        }
        include("pages/homes/footer.php");
    ?>
    <!-- Custom js file link-->
    <script src="script.js"></script>
    <!-- <script>
        let dropdown_items = document.querySelectorAll('.job-filter form .dropdown-container .dropdown .lists .items');
        dropdown_items.forEach(items => {
            items.onclick = () => {
                items_parent = items.parentElement.parentElement;
                let output = items_parent.querySelector('.output');
                output.value = items.innerText; 
            }
        })
    </script> -->

</body>
</html>