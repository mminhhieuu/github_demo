<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Quản lý phòng ban</title>
    <style>
        /* CSS cho bảng */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ccc;
        }

        th {
            background-color: #333;
            color: white;
        }

        /* CSS cho nút */
        .btn {
            padding: 5px 10px;
            text-decoration: none;
        }

        .btn-warning {
            background-color: #FFC107;
            color: #333;
        }

        .btn-danger {
            background-color: #FF5722;
            color: white;
        }

        .them-phong-ban {
            background-color: pink;
            color: white;
            border: 1px;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        /* CSS cho nút khi di chuột qua */
        .them-phong-ban:hover {
            background-color: orange;
        }
        
    </style>
</head>
<body>
    <?php
    require "connect.php";
    $sql = "SELECT * FROM phongban";
    
    if (isset($_POST['tim'])) {
        $timkiem = $_POST['timkiem'];
        $sql = "SELECT * FROM phongban WHERE phong_ban LIKE '%$timkiem%'";
    }

    $result = $conn->query($sql);
    ?>

    <button class='them-phong-ban'>
        <a href="themphongban.php">Quay lại</a>
    </button>
    
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Mã phòng ban</th>
                <th>Tên phòng ban</th>
                <th>Email</th>
                <th>Ghi chú</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                     <td>" . $row['ma_pb'] . " </td>
                     <td>
                        <a href='danhsachnhanvien.php?ma_pb=" . $row['ma_pb'] . "'>" . $row['phong_ban'] . "</a>
                     </td>
                     <td>" . $row['email'] . " </td>
                     <td>" . $row['ghi_chu'] . "</td>
                     <td>
                         <a href='editphongban.php?ma_pb=" . $row['ma_pb'] . "' class='btn btn-warning btn-sm'>Sửa</a>
                         <a href='xoapb.php?ma_pb=" . $row['ma_pb'] . "' class='btn btn-danger btn-sm' 
                            onclick='return confirmDelete()'>Xóa</a>
                     </td>
                 </tr>";
            }
            mysqli_close($conn);
            ?>
        </tbody>
    </table>

    <!-- JavaScript để xác nhận xóa -->
    <script>
        function confirmDelete() {
            return confirm("Bạn có chắc muốn xóa?");
        }
    </script>
</body>
</html>
