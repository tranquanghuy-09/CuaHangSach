<?php
    session_start();
    $idKh = $_SESSION['id'];
    include_once("View/vDetailProduct.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="./css/sidebarMenu.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styleIndex.css">

</head>

<body>
    <!-- header -->
    <?php 
    include_once("View/headerIndexKh.php"); 
    ?>


    <!--Nội dụng phần body  -->
    <?php
        chiTietSach();
    ?>


    <!-- footer -->
    <?php include_once("View/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
    function incrementQuantity(button, index) {
        var input = button.parentElement.querySelector('.quantity');
        input.value = parseInt(input.value) + 1;
    }

    function decrementQuantity(button, index) {
        var input = button.parentElement.querySelector('.quantity');
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
        }
    }
    </script>
</body>

</html>

<?php
         if (isset($_REQUEST['submitAddGh'])) {
            $amount = $_REQUEST['amount'];
            $idSach = $_REQUEST['maSach'];
            // echo "<script>alert('".$idKh.";".$amount.";".$idSach."')</script>";
            $result = insertGh($idSach, $idKh, $amount);
            if ($result==1) {
                echo "<script>alert('Thêm vào giỏ hàng thành công')</script>";
            } else {
                echo "<script>alert('Thêm vào giỏ hàng không thành công')</script>";
            }
        }
    ?>

<?php
    if (isset($_REQUEST['dx'])){
        session_destroy();
    }
?>