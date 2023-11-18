<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Xóa thông tin phòng ban</title>
</head>
<body>
	<?php
			$servername="localhost";
			$username="root";
			$Password="";
			$dbname="web_nhom2";
			$conn= new mysqli($servername,$username,$Password,$dbname);
			if ($conn->connect_error) {
	  			echo "Connection failed: " . $conn->connect_error;
			}
			$ma_pb=$_REQUEST['ma_pb'];
			$sql_del="Delete from phongban where ma_pb='".$ma_pb."'";
			$result=$conn->query($sql_del);
			if($result)
			{
				Header('Location:../code/dsphongban.php');
			}
			$conn->close();
	?>

</body>
</html>