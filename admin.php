<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../CuaHangSach/css/responAdmin.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styleAdmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
.btn-adj {
    border: 1px solid #ccc;
}

.btn-adj:hover {
    background-color: #cccccc47;
}

.btn-search {
    margin-left: -3px;
    WIDTH: 28px;
    height: 28px;
    border: none;
    background-color: #ccc;
    border-top-right-radius: 3px;
    border-bottom-right-radius: 3px;
    color: #00000073;
    border: 1px solid;
    border-left: 0;
}

.btn-search:hover {
    color: #00000096;
}
</style>
<?php
    $chkSearch = false;
?>

<body>
    <?php include_once("View/headerAdmin.php"); ?>
    <div class="menu-toggle">
        <div class="hamburger">
            <span></span>
        </div>
    </div>

    <div class="app">
        <aside class="sidebar" style='margin: 0;'>
            <h2>Menu</h2>
            <nav class="menu" id="menu">
                <a href="admin.php?sach" class="menu-item pd-t">Sách</a>
                <a href="admin.php?ls" class="menu-item pd-t">Loại Sách</a>
                <a href="admin.php?nxb" class="menu-item pd-t">Nhà Xuất
                    Bản</a>
                <a href="admin.php?tg" class="menu-item pd-t">Tác giả</a>
                <a href="admin.php?kh" class="menu-item pd-t">Khách Hàng</a>
                <a href="admin.php?nv" class="menu-item pd-t">Nhân Viên</a>
                <a href="admin.php?kho" class="menu-item pd-t">Kho Sách</a>
                <a href="admin.php?dondathang" class="menu-item pd-t">Đơn dặt hàng</a>
                <a href="admin.php?bl" class="menu-item pd-t">Bình luận</a>
            </nav>

        </aside>

        <main class="content">
            </form>
            <?php
                if (isset($_REQUEST['searchNameNxb'])) { // Tìm NXB
                        include_once('View/NXB/vNXB.php');
                        $p = new viewNXB();
                        $chkSearchNxb = true;
                        $p -> viewNxbByName($_REQUEST['searchNameNxb']);
                    }elseif (isset($_REQUEST['searchNameBook'])) { // TÌm sách
                        include_once('View/Module/vSach.php');
                        $p = new viewSach();
                        $chkSearchSach = true;
                        $p -> viewBookByName($_REQUEST['searchNameBook']);
                    } elseif (isset($_REQUEST['rAddNXB'])) { // Thêm NXB
                        include_once('View/NXB/vAddNXB.php');
                    }elseif (isset($_REQUEST['rAddSach'])) { // Thêm sách
                        include_once('View/Module/vAddSach.php');
                    }elseif (isset($_REQUEST['DelNXB'])) { // Xóa NXB
                        include_once('View/NXB/vDelNXB.php');
                    }elseif (isset($_REQUEST['DelBook'])) { // xóa sách
                        include_once('View/Module/vDelSach.php');
                    }elseif (isset($_REQUEST['DelBL'])) { // Xóa bình luận
                        include_once('View/Module/vDelBL.php');
                    }elseif (isset($_REQUEST['UpdNXB']) ) { // cập nhật NXB
                        include_once('View/NXB/vUpdNXB.php');
                    }elseif (isset($_REQUEST['UpdBook']) ) { // cập nhật Sách
                        include_once('View/Module/vUpdSach.php');
                    } elseif (isset($_REQUEST['nxb'])){ // view nxb
                        include_once('View/NXB/vNXB.php');  
                        $p = new viewNXB();
                        $p -> viewAllNXB($tblNXB);
                    }elseif (isset($_REQUEST['bl'])){ // view bình luận
                        include_once('View/Module/vBinhLuan.php');  
                        $p = new viewBL();
                        $p -> viewAllBL();
                    }elseif (isset($_REQUEST['kh'])){ // view Khách hàng
                        include_once('View/KhachHang/vKH.php');  
                        $p = new viewKH();
                        $p -> viewAllKH();
                    }elseif (isset($_REQUEST['dondathang'])){ // view đơn đặt hàng
                        include_once('View/Module/vDonDatHang.php');  
                        $p = new viewDonDatHang();
                        $p -> viewAllDonDatHang();
                    }elseif (isset($_REQUEST['tg'])){ // view tác giả
                        include_once('View/Module/vTacGia.php');  
                        $p = new viewTacGia();
                        $p -> viewAllTacGia();
                    }elseif (isset($_REQUEST['sach'])){ // view sách
                        include_once('View/Module/vSach.php');  
                        $p = new viewSach();
                        $p -> viewAllSach();
                    }elseif (isset($_REQUEST['ls'])){ // view loại sách
                        include_once('View/Module/vLoaiSach.php');  
                        $p = new viewLoaiSach();
                        $p -> viewAllLoaiSach();
                    }elseif (isset($_REQUEST['nv'])){ //view nhân viên
                        include_once('View/Module/vNhanVien.php');  
                        $p = new viewNV();
                        $p -> viewAllNV();
                    }elseif (isset($_REQUEST['kho'])){ // view kho sách
                        include_once('View/Module/vKhoSach.php');  
                        $p = new viewKho();
                        $p -> viewAllKho();
                    }
                    else {
                        echo "<h1>TRANG DÀNH CHO ADMIN</h1>";
                    }
                    ?>
        </main>
    </div>

    <script>
    const menu_toggle = document.querySelector('.menu-toggle');
    const sidebar = document.querySelector('.sidebar');

    menu_toggle.addEventListener('click', () => {
        menu_toggle.classList.toggle('is-active');
        sidebar.classList.toggle('is-active');
    });
    </script>
    <?php include_once("View/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

</body>

</html>