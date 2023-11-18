<?php
$host = 'localhost';
 $username = "root";
 $password = "";
 $dbname ="web_nhom2";
 
 
          $conn = new mysqli($host, $username, $password, $dbname);
       if($conn->connect_errno){
           die("ket noi ko thanh cong".$conn->connect_errno);
       }
?>
