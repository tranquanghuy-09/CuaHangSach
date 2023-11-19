<?php
    include_once("Controller/cCart.php");
    $p = new ControlCart();
    $ma = $_SESSION['id'] ;
    $tbl = $p->GetThongTinVanChuyen($ma);
    $row = mysql_fetch_assoc($tbl);
    echo '<table>';
    echo '                <tr>';
    echo '                    <td>Địa chỉ</td>';
    echo '                    <td><input type="" name="" value="'.$row['NoiGiao'].'" id="" width="60"></td>';
    echo '                </tr>';
    echo '                <tr>';
    echo '                    <td style="">Số điện thoại</td>';
    echo '                    <td><input type="tel" name="" value="'.$row['SoDienThoai'].'" width="60" id=""></td>';
    echo '                </tr>';
    echo '                <tr>';
    echo '                    <td style="">Người nhận</td>';
    echo '                    <td><input type="text" name="" value="'.$row['HoTen'].'" width="60" id=""></td>';
    echo '                </tr>';
    echo '            </table>';
?>