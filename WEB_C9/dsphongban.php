<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quản lý danh mục phòng ban</title>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}
		th {
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: center;
			background-color: #04AA6D;
			color: white;
		}

		td {
			padding: 7px;
			text-align: center;
			border-bottom: 1px solid #ddd;
		}

		tr:hover {
			background-color: yellow; /* trỏ chuột đi qua thay đổi màu nền */
		}

		h1 {
			text-align: center;
		}

		a {
			display: inline-block;
			margin: 10px 0;
			padding: 10px 20px;
			background-color: #04AA6D;
			color: white;
			text-decoration: none;
		}

		a:hover {
			background-color: blue;
		}
	</style>
</head>
<body>
    <h1>DANH SÁCH PHÒNG BAN</h1>
	<a href="quanlypb.php">Quay lại</a><br>
	<a href="dsnhanvien.php?mapb=<?php echo $row['mapb']; ?>">Xem nhân viên</a>

	<?php
		// Thông tin kết nối tới cơ sở dữ liệu
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "web_nhom2";

        // Tạo kết nối tới cơ sở dữ liệu
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Kiểm tra kết nối
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
	
		// Chuẩn bị câu truy vấn SELECT và sắp xếp theo tenpb
		$sql = "SELECT * FROM phongban ORDER BY tenpb";

		// Thực thi câu truy vấn
		$result = $conn->query($sql);

		// Kiểm tra và hiển thị kết quả
		if ($result->num_rows > 0) {
			echo '<table>';
			echo '<tr>';
			echo '<th>Mã Phòng Ban</th>';
			echo '<th>Tên Phòng Ban</th>';
			echo '<th>Email</th>';
			echo '<th>Ghi chú</th>';
			echo '<th>Sửa</th>';
			echo '<th>Xóa</th>';
			echo '</tr>';
			while ($row = $result->fetch_assoc()) {
				echo '<tr>';
				echo '<td>' . $row["mapb"] . '</td>';
				echo '<td>' . $row["tenpb"] . '</td>';
				echo '<td>' . $row["email"] . '</td>';
				echo '<td>' . $row["ghichu"] . '</td>';
				echo "<td><a href='editphongban.php?mapb=" . $row["mapb"] . "'>Sửa PB</a></td>";
				echo "<td><a href='dellphongban.php?mapb=" . $row["mapb"] . "'>Xóa PB</a></td>";
				echo '</tr>';
			}
			echo '</table>';
		} else {
			echo "KHÔNG CÓ PHÒNG BAN!";
		}

		// Đóng kết nối
		$conn->close();
	?>
</body>
</html>
