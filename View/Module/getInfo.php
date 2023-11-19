<?php
    session_start();
        include_once('./Controller/cNXB.php');
        function getNameNXB($nxb){
            $p = new controlNXB();
            $tbl = $p -> getAllNXB();
            if (mysql_num_rows($tbl) > 0){
                while ($row = mysql_fetch_assoc($tbl)){
                    if ($row['MaNXB'] == $nxb) {
                        return $row['TenNXB'];
                    }
                }
            }
        } 

        include_once('./Controller/cModule.php');
        function getNameCategory($category){
            $p = new controlModule();
            $tbl = $p -> getAllLoaiSach();
            if (mysql_num_rows($tbl) > 0){
                while ($row = mysql_fetch_assoc($tbl)){
                    if ($row['MaLoai'] == $category) {
                        return $row['TenLoai'];
                    }
                }
            }
        } 

        function checkSoLuongNhap($sl){
            $p = new controlModule();
            $tbl = $p -> getAllKho();
            if (mysql_num_rows($tbl) > 0){
                while ($row = mysql_fetch_assoc($tbl)){
                    if (($row['SoLuongTonKho'] + $sl) > $row['SoLuongTrong']) {
                        return false;
                    } else {
                        return true;    
                    }
                }
            }
        } 

        // include_once('./Controller/cModule.php');
        function getNameKH($KH){
            $p = new controlModule();
            $tbl = $p -> getAllKH();
            if (mysql_num_rows($tbl) > 0){
                while ($row = mysql_fetch_assoc($tbl)){
                    if ($row['MaKH'] == $KH) {
                        return $row['HoTen'];
                    }
                }
            }
        } 

        function getNameSach($Sach){
            $p = new controlModule();
            $tbl = $p -> getAllSach();
            if (mysql_num_rows($tbl) > 0){
                while ($row = mysql_fetch_assoc($tbl)){
                    if ($row['MaSach'] == $Sach) {
                        return $row['TieuDe'];
                    }
                }
            }
        } 

        function getImgSach($Sach){
            $p = new controlModule();
            $tbl = $p -> getAllSach();
            if (mysql_num_rows($tbl) > 0){
                while ($row = mysql_fetch_assoc($tbl)){
                    if ($row['MaSach'] == $Sach) {
                        return $row['HinhAnh'];
                    }
                }
            }
        } 

    // phân trang admin
    // function pagination($url, ){
    //     include_once("Controller/cModule.php");
    //     $p = new controlModule();
    //     if (!$_SESSION['login']){
    //         $chkAddCart = 'login.php';
    //         $temp = 'index.php';
    //     } else {
    //         $chkAddCart = '#';
    //         $temp = 'indexKh.php';
    //     }
    //     if(isset($_REQUEST["page"])){
    //         $page = $_REQUEST["page"];
    //         $count = $p->countProduct();
    //         $productpage= 8;
    //         $tbl = $p->getProductPage($page,$productpage);
    //     }elseif(isset($_REQUEST['btnSearch'])){
    //         $search = $_REQUEST['search'];
    //         $tbl = $p ->getAllProductBySearch($search);
    //     }elseif($_REQUEST["previous"]){
    //         echo "<script> alert('có')</script>";
    //     }else{
    //         echo "<script> window.location='".$temp."?page=1'</script>";
    //     }
    // }
?>