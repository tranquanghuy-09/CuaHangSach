<?php
    include_once('./Controller/cModule.php');
    include_once('getInfo.php');
    class viewBL{
        function viewAllBL(){
            $p = new controlModule();
            $tbl = $p -> getAllBL();
            $this -> display($tbl);
        }

        function display($tbl){
            if ($tbl) {
                if (mysql_num_rows($tbl) > 0){
                    $dem = 0 ;
                    echo "<div style='margin:10px;'> <h2>DANH SÁCH BÌNH LUẬN</h2>";
                    echo '<form action="#" method="post" >';
                    echo '<input type="text" name="searchName" placeholder="Tìm kiếm" />';
                    echo '<button type="submit" class="btn-search">';
                    echo '<i class="fas fa-search"></i>';
                    echo '</button>';
                    // echo "<a style='float: right;' class='btn btn-success' href='admin.php?rAddNXB'>Thêm</a>";
                    echo '</form>';
                    echo '<table class="table">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th scope="col">Khách hàng</th>';
                    echo '<th scope="col">Sách</th>';
                    echo '<th scope="col">Nội dung</th>';
                    echo '<th scope="col">Ngày bình luận</th>';
                    echo '<th scope="col">Tùy chỉnh</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    while ($row = mysql_fetch_assoc($tbl)){
                        if ($dem == 0 ) {
                            echo '<tr>';
                        }
                        echo '<td scope="row">'.getNameKH($row['MaKH']).'</td>';
                        echo '<td>'.getNameSach($row['MaSach']).'</td>';
                        echo '<td>'.$row['NoiDung'].'</td>';
                        $formattedDate = date('d/m/Y', strtotime($row['NgayBinhLuan']));
                        echo '<td>'.$formattedDate.'</td>';
                        echo "<td>  
                        <a class='btn btn-adj' style='margin-top: 5px' href='admin.php?DelBL=".$row['MaBinhLuan']."' onclick='return confirm(\"Có chắc chắn xóa không\")'><i class='fa fa-times' aria-hidden='true'></i></a> </td>";
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
            } 
    }
    }
?>