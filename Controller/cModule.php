<?php
    include_once('Model/mModule.php');
    class controlModule{
        function getAllSach(){
            $p = new modelModule();
            $tbl = $p -> selectAllSach();
            if (!$tbl) {
                return false;
            } else {
                if (mysql_num_rows($tbl) > 0)
                {
                    return $tbl;
                } else {
                    return 0;
                }
            }
        }
        
        function getAllSachLatest(){
            $p = new modelModule();
            $tbl = $p -> selectAllSachLatest();
            if (!$tbl) {
                return false;
            } else {
                if (mysql_num_rows($tbl) > 0)
                {
                    return $tbl;
                } else {
                    return 0;
                }
            }
        }

        function getAllBookByName($name){
            $p = new modelModule();
            $tblProduct = $p -> selectAllBookByName($name);
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

        function getAllBookById($id){
            $p = new modelModule();
            $tblProduct = $p -> selectAllBookById($id);
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

        function addBook($name, $anh, $price, $amount, $describe, $note, $year, $nxb, $category, $warehouse){
            include_once('format.php');
            $p = new modelModule();
            $tbl = $p->selectAllSach();
            if(mysql_num_rows($tbl) > 0) {
                mysql_data_seek($tbl, mysql_num_rows($tbl)-1);
                $row = mysql_fetch_assoc($tbl);
                $so = preg_replace("/[^0-9]/", "", $row['MaSach']);
                $ma = $so+1;
                $identityVariable =  formatData('S',$ma);
                $nameAnh = $anh['name'];
                if (move_uploaded_file($anh['tmp_name'],"image/$nameAnh")){
                    $ins = $p -> insertBook($identityVariable ,$name, $nameAnh, $price, $amount, $describe, $note, $year, $nxb, $category, $warehouse);
                        if ($ins) {
                            return 1;
                        } else {
                            return 0; //Khong the insert
                        }
                } else {
                    return -1; //$imageErr = 'Không lưu được ảnh!';
                }
            } else {
                $ins = $p -> insertBook('S01' ,$name, $nameAnh, $price, $amount, $describe, $note, $year, $nxb, $category, $warehouse);
                if ($ins) {
                    return 1;
                } else {
                    return 0; //Khong the insert
                }
            }
        }

        function deleBook($idBook){
            $p = new modelModule();
            $ins = $p -> deleteBook($idBook);
            if ($ins) {
                return 1;
            } else {
                return 0;
            }
        }
        
        function updBookHaveImage($id, $name, $anh, $price, $amount, $describe, $note, $year, $nxb, $category, $warehouse){
            $p = new modelModule();
            $nameAnh = $anh['name'];
            if (move_uploaded_file($anh['tmp_name'],"image/$nameAnh")){
                    $ins = $p -> updateBookHaveImage($id, $name, $nameAnh, $price, $amount, $describe, $note, $year, $nxb, $category, $warehouse);
                    if ($ins) {
                        return 1;
                    } else {
                        return 0; //Khong the update
                    }
            } else {
                return -1; //$imageErr = 'Không lưu được ảnh!';
            }
        }

        function updBookNoImage($id, $name, $price, $amount, $describe, $note, $year, $nxb, $category, $warehouse){
            $p = new modelModule();
            $ins = $p -> updateBookNoImage($id, $name, $price, $amount, $describe, $note, $year, $nxb, $category, $warehouse);
            if ($ins) {
                return 1;
            } else {
                return 0; //Khong the update
            }

        }

        function getAllDonDatHang(){
            $p = new modelModule();
            $tbl = $p -> selectAllDonDatHang();
            if (!$tbl) {
                return false;
            } else {
                if (mysql_num_rows($tbl) > 0)
                {
                    return $tbl;
                } else {
                    return 0;
                }
            }
        }

        function getAllKho(){
            $p = new modelModule();
            $tbl = $p -> selectAllKho();
            if (!$tbl) {
                return false;
            } else {
                if (mysql_num_rows($tbl) > 0)
                {
                    return $tbl;
                } else {
                    return 0;
                }
            }
        }

        function getAllLoaiSach(){
            $p = new modelModule();
            $tbl = $p -> selectAllLoaiSach();
            if (!$tbl) {
                return false;
            } else {
                if (mysql_num_rows($tbl) > 0)
                {
                    return $tbl;
                } else {
                    return 0;
                }
            }
        }

        function getAllNhanVien(){
            $p = new modelModule();
            $tbl = $p -> selectAllNhanVien();
            if (!$tbl) {
                return false;
            } else {
                if (mysql_num_rows($tbl) > 0)
                {
                    return $tbl;
                } else {
                    return 0;
                }
            }
        }
        
        function getAllProduct(){
            $p = new modelModule();
            $tbl = $p -> SelectAllProduct();
            if (!$tbl) {
                return false;
            } else {
                if (mysql_num_rows($tbl) > 0)
                {
                    return $tbl;
                } else {
                    return 0;
                }
            }
        }

        function getAllTacGia(){
            $p = new modelModule();
            $tbl = $p -> SelectAllTacGia();
            if (!$tbl) {
                return false;
            } else {
                if (mysql_num_rows($tbl) > 0)
                {
                    return $tbl;
                } else {
                    return 0;
                }
            }
        }
        
        // Khách hàng
        function getAllKH(){
            $p = new modelModule();
            $tbl = $p -> SelectAllKH();
            if (!$tbl) {
                return false;
            } else {
                if (mysql_num_rows($tbl) > 0)
                {
                    return $tbl;
                } else {
                    return 0;
                }
            }
        }

        function getInfoKh($id){
            $p = new modelModule();
            $tbl = $p -> getInfoKh($id);
            if (!$tbl) {
                return false;
            } else {
                if (mysql_num_rows($tbl) > 0)
                {
                    return $tbl;
                } else {
                    return 0;
                }
            }
        }

        
        
        // Bình luận
        function getAllBL(){
            $p = new modelModule();
            $tbl = $p -> selectAllBinhLuan();
            if (!$tbl) {
                return false;
            } else {
                if (mysql_num_rows($tbl) > 0)
                {
                    return $tbl;
                } else {
                    return 0;
                }
            }
        }

        function deleBinhLuan($id){
            $p = new modelModule();
            $tbl = $p -> deleteBinhLuan($id);
            if (!$tbl) {
                return false;
            } else {
                if (mysql_num_rows($tbl) > 0)
                {
                    return $tbl;
                } else {
                    return 0;
                }
            }
        }

        // Lấy thông tin user
        function getUser($id){
            $p = new modelModule();
            $tblKh = $p -> chkUserKH($id);
            $tblNv = $p -> chkUserNv($id);
            if (!$tblKh) {
                if (!$tblNv){
                    return false;
                } else {
                    if (mysql_num_rows($tblNv) > 0)
                    {
                        return $tblNv;
                    } else {
                        return 0;
                    }
                }
            } else {
                if (mysql_num_rows($tblKh) > 0)
                {
                    return $tblKh;
                } else {
                    return 0;
                }
            }
        }
    }
?>