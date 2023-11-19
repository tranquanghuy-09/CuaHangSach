<?php
    include_once('Model/mNXB.php');
    class controlNXB{
        function getAllNXB(){
            $p = new modelNXB();
            $tblNXB = $p -> selectAllNXB();
            if (!$tblNXB) {
                return false;
            } else {
                if (mysql_num_rows($tblNXB) > 0)
                {
                    return $tblNXB;
                } else {
                    return 0;
                }
            }
        }

        function addNXB($tennxb, $diachi, $namthanhlap){
            include_once('format.php');
            $p = new modelNXB();
            $tbl = $p->selectAllNXB();
            mysql_data_seek($tbl, mysql_num_rows($tbl)-1);
            $row = mysql_fetch_assoc($tbl);
            // print_r($row);
            $so = preg_replace("/[^0-9]/", "", $row['MaNXB']);
            $ma = $so+1;
            $identityVariable =  formatData('NXB',$ma);
            $ins = $p -> insertNXB($identityVariable, $tennxb, $diachi, $namthanhlap);
            if ($ins) {
                return 1;
            } else {
                return 0; //Khong the insert
            }
        }

        function deleNXB($idNXB){
            $p = new modelNXB();
            $ins = $p -> deleteNXB($idNXB);
            if ($ins) {
                return 1;
            } else {
                return 0; //Khong the insert
            }
        }
        
        function updNXB($id, $name, $year, $address){
            $p = new modelNXB();
            $ins = $p -> updateNXB($id, $name, $year, $address);
            if ($ins) {
                return 1;
            } else {
                return 0; //Khong the update
            }
        }

        function getAllNxbByName($name){
            $p = new modelNXB();
            $tblProduct = $p -> selectAllNxbByName($name);
            if (!$tblProduct){
                return false;
            } else {
                if (mysql_num_rows($tblProduct)>0) {
                    return $tblProduct;
                } else {
                    return 0;
                }
            }
        } 

        function getAllNxbById($id){
            $p = new modelNXB();
            $tblProduct = $p -> selectAllNxbById($id);
            if (!$tblProduct){
                return false;
            } else {
                if (mysql_num_rows($tblProduct)>0) {
                    return $tblProduct;
                } else {
                    return 0;
                }
            }
        } 
    }
?>