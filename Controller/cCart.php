<?php
    include_once("Model/mCart.php");
    class ControlCart{
        function GetAllProductInCart($ma){
            $p = new ModelCart();
            $tbl = $p -> Cart($ma);
            return $tbl;
        }

        function GetDeleteProductInCart($ma){
            $p = new ModelCart();
            $tbl = $p -> DeleteProductInCart($ma);
            return $tbl;
        }

        function GetThongTinVanChuyen($ma){
            $p = new ModelCart();
            $tbl = $p -> InfoVanChuyen($ma);
            mysql_data_seek($tbl, mysql_num_rows($tbl)-1);
            return $tbl;
        }

        function GetAddDonHang($makh,$noigiao,$tongtien,$products,$idCard){
            $p = new ModelCart();
            $kq = $p -> AddDonHang($makh,$noigiao,$tongtien,$products,$idCard);
            if ($kq) {
                return 1;
            } else {
                return 0; //Khong the insert
            }
        }

        function GetTongSLByMaSach($ma){
            $p = new ModelCart();
            $tongsl = $p -> TongSLByMaSach($ma);
            return $tongsl;
        }
    }
?>