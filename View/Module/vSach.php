<?php
    include_once('./Controller/cModule.php');
    include_once('getInfo.php');
    class viewSach{
        function viewAllSach(){
            $p = new controlModule();
            $tbl = $p -> getAllSachLatest();
            $location = 'admin.php';
            $this -> display($tbl, $location);
        }

        function viewBookByName($ten){
            $p = new controlModule();
            $tbl = $p -> getAllBookByName($ten);
            $location = 'admin.php?sach';
            $this -> display($tbl, $location);
        }
        
        function display($tbl, $location){
            if ($tbl) {
                if (mysql_num_rows($tbl) > 0){
                    $dem = 0 ;
                    echo "<div style='margin:10px;'> <h2>QUẢN LÝ SÁCH</h2>";
                    echo '<form action="#" method="post" >';
                    echo '<input type="text" name="searchNameBook" placeholder="Tìm kiếm" />';
                    echo '<button type="submit" class="btn-search">';
                    echo '<i class="fas fa-search"></i>';
                    echo '</button>';
                    echo "<a style='float: right;' class='btn btn-success' href='admin.php?rAddSach'>Thêm</a>";
                    echo '</form>';
                    echo '<table class="table">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th scope="col">Mã sách</th>';
                    echo '<th scope="col">Tiêu đề</th>';
                    echo '<th scope="col">Đơn giá</th>';
                    echo '<th scope="col">Số lượng</th>';
                    echo '<th scope="col">Mô tả</th>';
                    echo '<th scope="col">Năm sản xuất</th>';
                    echo '<th scope="col">Hình Ảnh</th>';
                    echo '<th scope="col">Nhà xuất bản</th>';
                    echo '<th scope="col">Thể loại</th>';
                    echo '<th scope="col">Ghi chú</th>';
                    echo '<th scope="col">Tùy chỉnh</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    while ($row = mysql_fetch_assoc($tbl)){
                        if ($dem == 0 ) {
                            echo '<tr>';
                        }
                        echo '<th scope="row">'.$row['MaSach'].'</th>';
                        echo ' <td>'.$row['TieuDe'].'</td>';
                        echo ' <td>'.number_format($row["DonGia"]).' đ</td>';
                        echo ' <td>'.$row['SoLuong'].'</td>';
                        echo ' <td>'.$row['MoTa'].'</td>';
                        echo ' <td>'.$row['NamSanXuat'].'</td>';
                        echo ' <td>';
                        echo "<img style='width: 5rem; height: 5rem;' src ='image/".$row['HinhAnh']."'/>";
                        echo '</td>';
                        echo ' <td >'.getNameNXB($row['MaNXB']).'</td>';
                        echo ' <td>'.getNameCategory($row['MaLoai']).'</td>';
                        echo ' <td>'.$row['GhiChu'].'</td>';
                        echo "<td><a class='btn btn-adj' href='admin.php?UpdBook=".$row['MaSach']."'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>  
                        <a class='btn btn-adj' style='margin-top: 5px' href='admin.php?DelBook=".$row['MaSach']."
                        ' onclick='return confirm(\"Có chắc chắn xóa không\")'><i class='fa fa-times' aria-hidden='true'></i></a> </td>";
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
                echo '<script>alert("Không tìm thấy sách")</script>';
                echo '<script> window.location = "'.$location.'"; </script>';
        }
    }
    }
?>