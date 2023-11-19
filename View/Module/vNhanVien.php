<?php
    include_once('./Controller/cModule.php');
    class viewNV{
        function viewAllNV(){
            $p = new controlModule();
            $tbl = $p -> getAllNhanVien();
            $location = 'admin.php';
            $this -> display($tbl, $location);
        }

        function display($tbl, $location){
            if ($tbl) {
                if (mysql_num_rows($tbl) > 0){
                    $dem = 0 ;
                    echo "<div style='margin:10px;'> <h2>QUẢN LÝ NHÂN VIÊN</h2>";
                    echo '<form action="#" method="post" >';
                    echo '<input type="text" name="searchName" placeholder="Tìm kiếm" />';
                    echo '<button type="submit" class="btn-search">';
                    echo '<i class="fas fa-search"></i>';
                    echo '</button>';
                    echo "<a style='float: right;' class='btn btn-success' href='#'>Thêm</a>";
                    echo '</form>';
                    echo '<table class="table">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th scope="col">Mã</th>';
                    echo '<th scope="col">Họ tên</th>';
                    echo '<th scope="col">Email</th>';
                    echo '<th scope="col">Số điện thoại</th>';
                    echo '<th scope="col">Lương </th>';
                    echo '<th scope="col">Ngày sinh</th>';
                    echo '<th scope="col">Trạng thái</th>';
                    echo '<th scope="col">Loại NV</th>';
                    echo '<th scope="col">Mật khẩu</th>';
                    echo '<th scope="col">Tùy chỉnh</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    while ($row = mysql_fetch_assoc($tbl)){
                        if ($dem == 0 ) {
                            echo '<tr>';
                        }
                        echo '<th scope="row">'.$row['MaNhanVien'].'</th>';
                        echo ' <td>'.$row['HoTen'].'</td>';
                        echo ' <td>'.$row['Email'].'</td>';
                        echo ' <td>'.$row['SoDienThoai'].'</td>';
                        echo ' <td>'.$row['Luong'].'</td>';
                        echo ' <td>'.$row['NgaySinh'].'</td>';
                        echo ' <td>'.$row['TrangThaiHD'].'</td>';
                        echo ' <td>'.$row['MaLoaiNV'].'</td>';
                        echo ' <td>***</td>';
                        echo "<td><a class='btn btn-adj' href='#'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>  
                        <a class='btn btn-adj' style='margin-top: 5px' href='#' onclick='return confirm(\"Có chắc chắn xóa không\")'><i class='fa fa-times' aria-hidden='true'></i></a> </td>";
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