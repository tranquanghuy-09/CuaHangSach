<?php
    include_once('connect.php');
    class modelNXB{
        function selectAllNXB(){
            $con;
            $p = new connect();
            if ($p -> ConnectDB($con)){
                $string = 'select * from nhaxuatban';
                $table = mysql_query($string);
                $p -> CloseConnect($con);
                return $table;
            } else {
                return false;
            }
        }

        function insertNXB($ma, $tennxb, $diachi, $namthanhlap){
            $con;
            $p = new connect();
            if ($p -> ConnectDB($con)){
                $string = "insert into nhaxuatban(MaNXB, TenNXB, DiaChi, NamThanhLap) values";
                $string .= " ('".$ma."','".$tennxb."','".$diachi."',".$namthanhlap.")";
                $kq = mysql_query($string);
                $p -> CloseConnect($con);
                if ($kq) {
                    return $kq;
                }
            } else {
                return false;
            }
        }

        function deleteNXB($idNXB){
            $con;
            $p = new connect();
            if ($p -> ConnectDB($con)){
                $string = "delete from nhaxuatban where MaNXB = '".$idNXB."'";
                $kq = mysql_query($string);
                $p -> CloseConnect($con);
                return $kq;
            } else {
                return false;
            }
        }
        
        function selectAllNxbByName($name){
            $con;
            $p = new connect();
            if ($p -> ConnectDB($con)){
                $string = "select * from nhaxuatban where TenNXB like '%".$name."%'";
                $table = mysql_query($string);  
                $p -> CloseConnect($con);
                return $table;  
            } else {
                return false;
            }
        }

        function selectAllNxbById($idNXB){
            $con;
            $p = new connect();
            if ($p -> ConnectDB($con)){
                $string = "select * from nhaxuatban where MaNXB like '".$idNXB."'";
                $table = mysql_query($string);  
                $p -> CloseConnect($con);
                return $table;  
            } else {
                return false;
            }
        }

        function updateNXB($id, $name, $year, $address){
            $con;
            $p = new connect();
            if ($p -> ConnectDB($con)){
                $string = "UPDATE nhaxuatban SET TenNXB = '$name', DiaChi = '$address', NamThanhLap = $year  WHERE MaNXB like '$id';";
                $kq = mysql_query($string);
                $p -> CloseConnect($con);
                return $kq;
            } else {
                return false;
            }
        }
    }
?>