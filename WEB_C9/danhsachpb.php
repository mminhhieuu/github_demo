<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Quản lý nhân sự</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8 gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <style>
        .nav-item {
            margin: 0px;
            width: 100%;
            background-color: rgb(12, 220, 109);
            padding: 0px;
            list-style: none;
            box-shadow: 0 0 5px orange;
        }

        ul.nav-item>li>a {
            display: block;
            line-height: 40px;
            text-decoration: none;
            font-variant: inherit;
            padding-left: 25px;
            color: white;
        }

        ul.nav>li>a:hover {
            color: rgb(19, 19, 7);
            font-weight: bolder;
        }

        ul.nav>li {
            margin: 0 5px;
            position: relative;
        }

        ul.nav>li:hover>.sub-menu {
            display: block;
        }

        .sub-menu {
            margin: 0px;
            padding: 0px;
            box-shadow: 0 0 5px orangered;
            list-style: none;
            width: 100%;
            position: relative;
            display: none;
        }

        .sub-menu>li>a {
            display: block;
            line-height: 40px;
            text-decoration: none;
            font-variant: inherit;
            padding-left: 25px;
            color: rgb(13, 6, 6);
        }

        .sub-menu>li>a:hover {
            margin: 0 5px;
            position: relative;
            background: url('b2.gif') no-repeat left center;
            color: red;
        }
    </style>
    <body>
        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-2 d-md-block bg-light sidebar">
                    <div class="position-sticky">
                        <ul class="nav flex-column">
                            <li>
                                <center><img
                                        src="https://taoanhdep.com/wp-content/uploads/2022/08/logo-mascot-anonymous.jpeg"
                                        alt="nhóm 2" width=50% height=50%></center>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Trang chủ </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="danhsachnv.php">Danh sách nhân viên</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="themnv.php">Thêm nhân viên </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="danhsachpb.php">Phòng ban</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="themnv.php">Thêm phòng ban </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main class="col-md-10 ms-sm-auto">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                        <div class="container">
                            <a class="navbar-brand" href="#"></a>

                            <!-- Thanh tìm kiếm trong menu -->

                            <form method="POST" action="" class="navbar-form ml-auto mt-6 mt-lg-0">
                                <div class="input-group">
                                    <input type="text" name="timkiem" class="form-control" placeholder="Tìm kiếm..."
                                        required>
                                    <div class="input-group-append">
                                        <button type="submit" name="tim" class="btn btn-primary">Tìm</button>
                                    </div>
                                </div>
                            </form>
                            <form method="POST" action="" class="navbar-form ml-auto mt-4 mt-lg-0">
                                Tài khoản đăng nhập
                            </form>
                        </div>
                    </nav>

                    <div class="container mt-4">
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
                                require "connett.php";
                                $sql = "SELECT * FROM phongban";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo
                                    "<tr>
                                     <td>" . $row["ma_pb"] . "</td>
                                     <td>" . $row["phong_ban"] . "</td>
                                     <td>" . $row["email"] . "</td>
                                     <td>" . $row["ghi_chu"] . "</td>
                                     <td>
                                     <a href='suapb.php?ma_pb=" . $row['ma_pb'] . "' class='btn btn-warning btn-sm'>Sửa</a>
                                     <a href='xoapb .php?ma_pb=" . $row['ma_pb'] . "' class='btn btn-danger btn-sm
                                        onclick='return confirm(\"Bạn có chắc muốn xóa?\")'>Xóa</a>
                                     </td>
                                    <tr>";
                                }

                                // Đóng kết nối
                                $conn->close();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </main>
            </div>
        </div>
</body>

</html>
