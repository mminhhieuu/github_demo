<?php
    require "connett.php";

if (isset($_GET["ma_nv"])) {
       $ma_nv = $_GET["ma_nv"];
}    
?>
<?php 
$sqli = "DELETE FROM nhanvien WHERE ma_nv ='$ma_nv'";
$qr = $conn->query($sqli);
header("Location:../WEB_C9/danhsachnv.php");
?>