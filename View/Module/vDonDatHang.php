<?php
    include_once('./Controller/cModule.php');
    class viewDonDatHang{
        function viewAllDonDatHang(){
            $p = new controlModule();
            $tbl = $p -> getAllDonDatHang();
            // $location = 'admin.php?dondathang';
            $this -> display($tbl);
        }

        function viewAllDonDatHangByKh($id){
            include_once('View/Module/getInfo.php');
            $p = new controlModule();
            $tbl = $p -> getInfoKh($id);
            $this -> displayByKh($tbl);
        }

        function display($tbl){
            if ($tbl) {
                if (mysql_num_rows($tbl) > 0){
                    $dem = 0 ;
                    echo "<div style='margin:10px;'> <h2>QUẢN LÝ ĐƠN ĐẶT HÀNG</h2>";
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
                    echo '<th scope="col">Mã Đơn hàng</th>';
                    echo '<th scope="col">Mã Khách hàng</th>';
                    echo '<th scope="col">Mã Sách</th>';
                    echo '<th scope="col">Ngày Giao</th>';
                    echo '<th scope="col">Số lượng</th>';
                    echo '<th scope="col">Ghi chú</th>';
                    echo '<th scope="col">Nơi giao</th>';
                    echo '<th scope="col">Tổng tiền</th>';
                    echo '<th scope="col">Tùy chỉnh</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    while ($row = mysql_fetch_assoc($tbl)){
                        if ($dem == 0 ) {
                            echo '<tr>';
                        }
                        echo '<th scope="row">'.$row['MaDonHang'].'</th>';
                        echo ' <td>'.$row['MaKH'].'</td>';
                        echo ' <td>'.$row['MaSach'].'</td>';
                        echo ' <td>'.$row['NgayGiao'].'</td>';
                        echo ' <td>'.$row['SoLuong'].'</td>';
                        echo ' <td>'.$row['GhiChu'].'</td>';
                        echo ' <td>'.$row['NoiGiao'].'</td>';
                        echo ' <td>'.$row['TongTien'].'</td>';
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
                // echo '<script> window.location = "'.$location.'"; </script>';
        }
    }

    function displayByKh($tbl){
        if ($tbl) {
            if (mysql_num_rows($tbl) > 0){
                while ($row = mysql_fetch_assoc($tbl)){
                    echo '<div class="box">'; 
                    echo "<div class='box-children'>"; 
                    echo "<div>"; 
                    echo "<img src='image/".getImgSach($row['MaSach'])."' style='width: 100px; height: 100px;' alt='anh'>";
                    echo "</div>"; 
                    echo "<div>";
                    echo "<h3>".getNameSach($row['MaSach'])."</h3><p>Số lượng: ".$row['SoLuong']."</p>";
                    echo "</div>"; 
                    echo "</div>"; 
                    echo "<div class='box-children adj-box-children'>"; 
                    echo "<div><p>Thông tin vận chuyển: ".$row['TinhTrang']."</p></div>";
                    echo "<div><h3>Tổng tiền: ".number_format($row["TongTien"])." đ</h3></div>";
                    echo "</div>";
                    echo "</div>"; 
                }
            } 
        } 
}
    }
?>