<?php
    include_once('./Controller/cNXB.php');
    class viewNXB{
        function viewAllNXB(){
            $p = new controlNXB();
            $tblNXB = $p -> getAllNXB();
            $location = 'admin.php';
            $this -> displayNXB($tblNXB, $location);
        }

        function viewNxbByName($ten){
            $p = new controlNXB();
            $tblNXB = $p -> getAllNxbByName($ten);
            $location = 'admin.php?nxb';
            $this -> displayNXB($tblNXB, $location);
        }

        function displayNXB($tblNXB, $location){
            if ($tblNXB) {
                if (mysql_num_rows($tblNXB) > 0){
                    $dem = 0 ;
                    echo "<div style='margin:10px;'> <h2>QUẢN LÝ NHÀ XUẤT BẢN</h2>";
                    echo '<form action="#" method="post" >';
                    echo '<input type="text" name="searchNameNxb" placeholder="Tìm kiếm" />';
                    echo '<button type="submit" class="btn-search">';
                    echo '<i class="fas fa-search"></i>';
                    echo '</button>';
                    echo "<a style='float: right;' class='btn btn-success' href='admin.php?rAddNXB'>Thêm</a>";
                    echo '</form>';
                    echo '<table class="table">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th scope="col">Mã</th>';
                    echo '<th scope="col">Tên NXB</th>';
                    echo '<th scope="col">Địa chỉ</th>';
                    echo '<th scope="col">Năm thành lập</th>';
                    echo '<th scope="col">Tùy chỉnh</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    while ($row = mysql_fetch_assoc($tblNXB)){
                        if ($dem == 0 ) {
                            echo '<tr>';
                        }
                        $MaNXB = $row['MaNXB'];                    
                        $TenNXB = $row['TenNXB'];                    
                        $DiaChi = $row['DiaChi'];  
                        $NamThanhLap = $row['NamThanhLap'];
                        echo '<th scope="row">'.$MaNXB.'</th>';
                        echo ' <td>'.$TenNXB.'</td>';
                        echo ' <td>'.$DiaChi.'</td>';
                        echo ' <td>'.$NamThanhLap.'</td>';
                        // echo "<td><a class='btn btn-warning' href='admin.php?UpdNXB=".$row['MaNXB']."'>Sửa</a>  
                        // <a class='btn btn-danger' style='margin-top: 5px' href='admin.php?DelNXB=".$row['MaNXB']."
                        // ' onclick='return confirm(\"Có chắc chắn xóa không\")'>Xóa</a> </td>";
                        // echo "</td>";
                        echo "<td><a class='btn btn-adj' href='admin.php?UpdNXB=".$row['MaNXB']."'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>  
                        <a class='btn btn-adj' style='margin-top: 5px' href='admin.php?DelNXB=".$row['MaNXB']."' onclick='return confirm(\"Có chắc chắn xóa không\")'><i class='fa fa-times' aria-hidden='true'></i></a> </td>";
                        echo "</td>";
                        echo '</tr>';     
                        $dem++;
                        if ($dem==2) {
                            echo '</tr>';
                            $dem = 0;
                        }          
                    }
                    echo '</tbody>';
                echo '</table>';
                } else {
                    echo '<script>alert("Khong co san pham")</script>';
                }
            } else {
                echo '<script> window.location = "'.$location.'"; </script>';
        }
    }
    }
?>