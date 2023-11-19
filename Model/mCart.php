<?php
    include_once("connect.php");
    class ModelCart{
        function Cart($ma){
            $conn;
            $p = new connect();
            $result = $p -> ConnectDB($conn);

            if($result){
                $query = "SELECT *
                FROM giohang
                JOIN sach ON giohang.MaSach = sach.MaSach
                JOIN khachhang ON giohang.MaKH = khachhang.MaKH 
                where giohang.MaKH = '$ma'";
                $tbl = mysql_query($query);

                $p -> CloseConnect($conn);
                return $tbl;
            }else{
                return false;
            }
        }

        function DeleteProductInCart($ma){
            $conn;
            $p = new connect();
            $result = $p -> ConnectDB($conn);

            if($result){
                $query = "DELETE 
                FROM giohang
                where MaGioHang = '$ma'";
                $tbl = mysql_query($query);

                $p -> CloseConnect($conn);
                return $tbl;
            }else{
                return false;
            }
        }

        function InfoVanChuyen($ma){
            $conn;
            $p = new connect();
            $result = $p -> ConnectDB($conn);

            if($result){
                $query = "SELECT *
                FROM dondathang
                JOIN khachhang ON dondathang.MaKH = khachhang.MaKH
                where dondathang.MaKH = '$ma'";
                $tbl = mysql_query($query);

                $p -> CloseConnect($conn);
                return $tbl;
            }else{
                return false;
            }
        }

        function AddDonHang($makh,$noigiao,$tongtien,$products,$idCart){
            $conn;
            $p = new connect();
            $result = $p -> ConnectDB($conn);
            if($result){
                // lấy tất cả donhang
                $donhang = mysql_query("select * from dondathang");
                $max=0;//tìm mã đơn hàng lớn nhất để cộng thêm 1
                if(mysql_num_rows($donhang) > 0){
                    while($row = mysql_fetch_assoc($donhang)){
                        $so = preg_replace("/[^0-9]/", "", $row['MaDonHang']);
                        if($so > $max){ 
                            $max = $so; 
                        }
                    }
                }
                $madh = $max+1;
                $identityVariable =  "DH"."$madh";
                //xử lý chuỗi ID sách và số lượng sách
                $IDSach='';
                $soluongsach='';
                foreach ($products as $product) {
                    $IDSach .= $product["productId"] . ' ';
                    $soluongsach .= $product["quantity"]  . ' '; 
                }


                $query = "INSERT INTO dondathang(
                    MaDonHang ,
                    MaKH ,
                    MaSach ,
                    NgayGiao ,
                    SoLuong ,
                    GhiChu ,
                    NoiGiao ,
                    TongTien ,
                    ChiTietDonHang ,
                    ChiTietSoLuong,
                    TinhTrangDonHang
                    )
                    VALUES (
                    '$identityVariable', '$makh', 'S01', NULL , '1', NULL , '$noigiao', '$tongtien', '$IDSach', '$soluongsach',0
                    );";
                $kq = mysql_query($query);
                // update sách trong database
                foreach ($products as $product) {
                    $masachmua = $product["productId"];
                    $soluongmua = $product["quantity"]; //số lượng sách mua
                    $soluongmua = intval($soluongmua);
                    $tblsoluong =  mysql_query("select SoLuong from sach where MaSach='$masachmua'");
                    $rowSoLuong = mysql_fetch_assoc($tblsoluong);
                    $Tongsoluong = $rowSoLuong["SoLuong"];

                    mysql_query("UPDATE sach SET SoLuong = ( $Tongsoluong - $soluongmua) WHERE MaSach = '$masachmua'");
                }

                // xóa giỏ hàng theo mã đã đặt
                for ($i = 0; $i < count($idCart); $i++) {
                    mysql_query("DELETE 
                    FROM giohang
                    where MaGioHang = '".$idCart[$i]."'");;// gọi hàm xóa đã viết ở trên để xóa giỏ hàng đả đặt
                }

                $p -> CloseConnect($conn);
                return $kq;
            }else{
                return false;
            }
        }

        // function lấy tống số lượng sách trong kho theo mã
        function TongSLByMaSach($ma){
            $conn;
            $p = new connect();
            $result = $p -> ConnectDB($conn);

            if($result){
                $tblsoluong =  mysql_query("select SoLuong from sach where MaSach='$ma'");
                $rowSoLuong = mysql_fetch_assoc($tblsoluong);
                $Tongsoluong = $rowSoLuong["SoLuong"];
                return $Tongsoluong;
            }else{
                return false;
            }
        }

    }

?>