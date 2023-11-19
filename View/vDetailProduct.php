<?php 
    include_once("Controller/CDetailProduct.php");
    
    function chiTietSach(){
        $maSach = $_REQUEST["maSach"];
        $p = new ControlDetail();
        $tbl = $p -> getDetailProduct($maSach);
        if($tbl){
            if(mysql_num_rows($tbl) > 0){
                echo "    <form action='#' method='post'>";
                echo "<div class = 'container my-4 rounded py-4'style='background-color:white'>";
                while($row = mysql_fetch_assoc($tbl)){
                echo '    <div class="row">';
                echo '<div class="col-4">';
                echo '    <img style="max-width: 100%;" class="card-img-top rounded" src="./image/'.$row['HinhAnh'].'">';
                echo '</div>';
                echo '<div class="col-1">';

                echo '</div>';
                echo '<div class="col-7 d-flex flex-column justify-content-between">';
                echo '    <div class="">';
                echo '        <h4>'.$row['TieuDe'].'</h4>';
                echo '    </div>';

                echo '    <div class="">';
                echo '        <p>Tác giả: '.$row['HoTen'].'</p>';
                echo '        <p>Nhà xuất bản: '.$row['TenNXB'].'</p>';
                echo '        <p>Thể loại: '.$row['TenLoai'].'</p><p> Số lượng tồn: '.$row['SoLuong'].'</p>';

                echo '    </div>';
                echo '    <div class="">   ';
                echo '        <input type="hidden" name="" class="price" value="'.$row['DonGia'].'">';
                echo '        <h4>Giá: '.$row['DonGia'].'.000đ </h4>';
                echo '        <p>';
                echo '            <button type="button" onclick="decrementQuantity(this, 0)" style="margin-right: 5px; width: 20px; border: 1px">-</button>';
                echo '            <input type="text" name="amount" class="quantity centered-number" placeholder="Quantity" style="width: 35px; text-align: center" value="1" oninput="validateNumberInput(this)">';
                echo '            <button type="button" onclick="incrementQuantity(this, 0)" style="margin-left: 5px; width: 20px; border: 1px">+</button>';
                echo '        </p>';
                echo '            </div>';

                echo '            <div class="">';
                echo '                <button type="submit" name="submitAddGh" class="btn btn-success">Thêm vào giỏ hàng</button>';
                echo '                <button type="button" class="btn btn-primary">Thanh toán</button>';
                echo '            </div>';
                echo '        </div>';
                echo '    </div>';
                }
                echo "</div>";
            echo "</form>";

            }else{
                echo "0 result";
            }
        }else{
            echo "Khong co gia tri";
        }
    }

    

    function insertGh($idSach, $idKh, $amount){
        $p = new ControlDetail();
        $result = $p -> addSachToGh($idSach, $idKh, $amount);
        return $result;
    }
?>