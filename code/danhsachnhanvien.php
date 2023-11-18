<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Danh sách nhân viên</title>
</head>
<body>
    <?php
    require "connect.php";

    // Kiểm tra xem có tham số ma_pb được truyền từ trang chính không
    if (isset($_GET['ma_pb'])) {
        $maPb = $_GET['ma_pb'];
        $sql = "SELECT * FROM nhanvien WHERE ma_pb = '$maPb'";
        $result = $conn->query($sql);

        echo "<h1>Danh sách nhân viên</h1>";
        echo "<table>";
        echo "<tr>
                <th>Mã nhân viên</th>
                <th>Họ tên</th>
                <th>Tên đăng nhập</th>
                <th>Giới tính</th>
                <th>Điện thoại</th>
                <th>Email</th>
                <th>Trình độ</th>
                <th>CCCD</th>
                <th>Địa chỉ</th>
                <th>Chức vụ</th>
                <th>Bộ phận</th>
                <th>Lương</th>
              </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['ma_nv'] . "</td>
                    <td>" . $row['ho_ten'] . "</td>
                    <td>" . $row['ten_dn'] . "</td>
                    <td>" . $row['gioi_tinh'] . "</td>
                    <td>" . $row['dien_thoai'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['trinh_do'] . "</td>
                    <td>" . $row['cccd'] . "</td>
                    <td>" . $row['dia_chi'] . "</td>
                    <td>" . $row['chuc_vu'] . "</td>
                    <td>" . $row['bo_phan'] . "</td>
                    <td>" . $row['luong'] . "</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "Không có mã phòng ban được chỉ định.";
    }

    mysqli_close($conn);
    ?>
</body>
</html>
