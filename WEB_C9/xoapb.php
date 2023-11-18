<?php
    require "connett.php";

if (isset($_GET["ma_pb"])) {
       $ma_pb = $_GET["ma_pb"];
}    
?>
<?php 
$sqli = "DELETE FROM phongban WHERE ma_pb ='$ma_pb'";
$qr = $conn->query($sqli);
header("Location:../WEB_C9/danhsachpb.php");
?>