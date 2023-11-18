<?php
$host = 'localhost';
$username = "root";
$password = "";
$dbname ="web_nhom2"; 

// kiểm tra kết nối
$conn = new mysqli($host, $username, $password, $dbname);

    if($conn->connect_error){
        echo "ket noi ko thanh cong".$conn->connect_error;
    }
?>
