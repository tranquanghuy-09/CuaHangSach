<?php
    include_once('connect.php');
    class modelModule{
        // Sach
        function selectAllSach(){
            $con;
            $p = new connect();
            if ($p -> ConnectDB($con)){
                $string = 'select * from sach';
                $table = mysql_query($string);
                $p -> CloseConnect($con);
                return $table;
            } else {
                return false;
            }
        }

        function selectAllSachLatest(){
            $con;   
            $p = new connect();
            if ($p -> ConnectDB($con)){
                $string = "SELECT * FROM sach ORDER BY MaSach DESC";
                $table = mysql_query($string);
                $p -> CloseConnect($con);
                return $table;
            } else {
                return false;
            }
        }


        function insertBook($identityVariable, $name, $image, $price, $amount, $describe, $note, $year, $nxb, $category, $warehouse){
            $con;   
            $p = new connect();
            if ($p -> ConnectDB($con)){
                $string = "insert into sach(MaSach, TieuDe, HinhAnh, DonGia, SoLuong, MoTa, GhiChu, NamSanXuat, MaNXB, MaLoai, MaKho) values ('$identityVariable','$name','$image', $price, $amount,'$describe', '$note', $year, '$nxb', '$category', '$warehouse')";
                $kq = mysql_query($string);
                $p -> CloseConnect($con);
                if ($kq) {
                    return $kq;
                }
            } else {
                return false;
            }
        }

        function updateBookHaveImage($id , $name, $image, $price, $amount, $describe, $note, $year, $nxb, $category, $warehouse){
            $con;
            $p = new connect();
            if ($p -> ConnectDB($con)){
                $string = "UPDATE sach SET TieuDe = '$name', HinhAnh = '$image', DonGia = $price, SoLuong = $amount, Mota='$describe', GhiChu = '$note', NamSanXuat = $year, MaNXB= '$nxb', MaLoai='$category', Makho='$warehouse' WHERE MaSach like '$id'";
                $kq = mysql_query($string);
                $p -> CloseConnect($con);
                return $kq;
            } else {
                return false;
            }
        }

        function updateBookNoImage($id , $name, $price, $amount, $describe, $note, $year, $nxb, $category, $warehouse){
            $con;
            $p = new connect();
            if ($p -> ConnectDB($con)){
                $string = "UPDATE sach SET TieuDe = '$name', DonGia = $price, SoLuong = $amount, Mota='$describe', GhiChu = '$note', NamSanXuat = $year, MaNXB= '$nxb', MaLoai='$category', Makho='$warehouse' WHERE MaSach like '$id'";
                $kq = mysql_query($string);
                $p -> CloseConnect($con);
                return $kq;
            } else {
                return false;
            }
        }

        function deleteBook($idBook){
            $con;
            $p = new connect();
            if ($p -> ConnectDB($con)){
                $string = "delete from sach where MaSach = '".$idBook."'";
                $kq = mysql_query($string);
                $p -> CloseConnect($con);
                return $kq;
            } else {
                return false;
            }
        }
        
        function selectAllBookByName($name){
            $con;
            $p = new connect();
            if ($p -> ConnectDB($con)){
                $string = "select * from sach where TieuDe like '%".$name."%'";
                $table = mysql_query($string);  
                $p -> CloseConnect($con);
                return $table;  
            } else {
                return false;
            }
        }

        function selectAllBookById($id){
            $con;
            $p = new connect();
            if ($p -> ConnectDB($con)){
                $string = "select * from sach where MaSach like '".$id."'";
                $table = mysql_query($string);  
                $p -> CloseConnect($con);
                return $table;  
            } else {
                return false;
            }
        }

        // Tac gia
        function selectAllTacGia(){
            $con;
            $p = new connect();
            if ($p -> ConnectDB($con)){
                $string = 'select * from tacgia';
                $table = mysql_query($string);
                $p -> CloseConnect($con);
                return $table;
            } else {
                return false;
            }
        }

        // Bình luận
        function selectAllBinhLuan(){
            $con;
            $p = new connect();
            if ($p -> ConnectDB($con)){
                $string = 'select * from binhluan';
                $table = mysql_query($string);
                $p -> CloseConnect($con);
                return $table;
            } else {
                return false;
            }
        }

        function deleteBinhLuan($id){
            $con;
            $p = new connect();
            if ($p -> ConnectDB($con)){
                $string = "delete from binhluan where MaBinhLuan like '$id'";
                $table = mysql_query($string);
                $p -> CloseConnect($con);
                return $table;
            } else {
                return false;
            }
        }
        
        // Nhan vien
        function selectAllNhanVien(){
            $con;
            $p = new connect();
            if ($p -> ConnectDB($con)){
                $string = 'select * from nhanvien';
                $table = mysql_query($string);
                $p -> CloseConnect($con);
                return $table;
            } else {
                return false;
            }
        }
        
        function selectAllLoaiSach(){
            $con;
            $p = new connect();
            if ($p -> ConnectDB($con)){
                $string = 'select * from loaisach';
                $table = mysql_query($string);
                $p -> CloseConnect($con);
                return $table;
            } else {
                return false;
            }
        }
        
        function selectAllKho(){
            $con;
            $p = new connect();
            if ($p -> ConnectDB($con)){
                $string = 'select * from khohang';
                $table = mysql_query($string);
                $p -> CloseConnect($con);
                return $table;
            } else {
                return false;
            }
        }
        
        function selectAllDonDatHang(){
            $con;
            $p = new connect();
            if ($p -> ConnectDB($con)){
                $string = 'select * from dondathang';
                $table = mysql_query($string);
                $p -> CloseConnect($con);
                return $table;
            } else {
                return false;
            }
        }
        
        //
        function selectAllKH(){
            $con;
            $p = new connect();
            if ($p -> ConnectDB($con)){
                $string = 'select * from khachhang';
                $table = mysql_query($string);
                $p -> CloseConnect($con);
                return $table;
            } else {
                return false;
            }
        }

        function getInfoKh($id){
            $con;
            $p = new connect();
            if ($p -> ConnectDB($con)){
                $string = "SELECT DISTINCT *
                FROM khachhang
                JOIN dondathang ON dondathang.MaKH = khachhang.MaKH
                JOIN loaikhachhang ON loaikhachhang.MaLoaiKH = khachhang.MaLoaiKH
                WHERE khachhang.MaKH LIKE '$id'";
                $table = mysql_query($string);
                $p -> CloseConnect($con);
                return $table;
            } else {
                return false;
            }
        }

        // kiểm tra user
        function chkUserKH($id){
            $con;
            $p = new connect();
            if ($p -> ConnectDB($con)){
                $string = "select * from khachhang where MaKH like '$id'";
                $table = mysql_query($string);
                $p -> CloseConnect($con);
                return $table;
            } else {
                return false;
            }
        }

        function chkUserNV($id){
            $con;
            $p = new connect();
            if ($p -> ConnectDB($con)){
                $string = "select * from nhanvien where MaKH like '$id'";
                $table = mysql_query($string);
                $p -> CloseConnect($con);
                return $table;
            } else {
                return false;
            }
        }
    }
?>