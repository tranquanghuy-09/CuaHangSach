<?php
include_once('./Controller/cNXB.php');
$p = new controlNXB();
$res = $p -> deleNXB($_REQUEST['DelNXB']);
if ($res) {
    echo "<script>alert('Xóa thành công')</script>";
} else {
    echo "<script>alert('Xóa thất bại')</script>";
}
echo '<script> window.location = "admin.php?nxb"; </script>';

?>