<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Quản lý nhân sự</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<style>
   .nav-item{
    margin: 0px;
    width:100%;
    background-color: rgb(12, 220, 109);
    padding: 0px;
    list-style: none;
    box-shadow: 0 0 5px orange;

}
ul.nav-item>li>a{
    display:block;
    line-height: 40px;
    text-decoration: none;
    font-variant: inherit;
    padding-left: 25px;
    color: white;
}
ul.nav>li>a:hover{
    color: rgb(19, 19, 7);
    font-weight: bolder;
}
ul.nav>li{
    margin:0 5px;
    position: relative;
}
ul.nav>li:hover>.sub-menu{
    display:block;
}
.sub-menu{
    margin:0px;
    padding: 0px;
    box-shadow: 0 0 5px orangered;
    list-style: none;
    width: 100%;
    position: relative;
    display:none;
}
.sub-menu>li>a{
    display:block;
    line-height: 40px;
    text-decoration: none;
    font-variant: inherit;
    padding-left: 25px;
    color:rgb(13, 6, 6);
}
.sub-menu>li>a:hover{
    margin:0 5px;
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
                           <center> <img src="https://taoanhdep.com/wp-content/uploads/2022/08/logo-mascot-anonymous.jpeg" alt="nhóm 2" width=50% hight=50%></center>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="trangchu.php">Trang chủ </a>
                           
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="danhsachpb.php">Danh sách nhân viên</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="themnv.php">Thêm nhân viên </a>
                                    </li>

                                </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="danhsachpb.php"> Phòng ban </a>
                            <ul class="sub-menu">
                                    <li>
                                        <a href="themnv.php">Thêm phòng ban</a>
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
                        <form method="POST" action="" class="navbar-form ml-auto mt-2 mt-lg-0">
                            <div class="input-group">
                                <input type="text" name="timkiem" class="form-control" placeholder="Tìm kiếm..." required>
                                <div class="input-group-append">
                                    <button type="submit" name="tim" class="btn btn-primary">Tìm</button>
                                </div>
                            </div>
                        </form>
                        <form method="POST" action="" class="navbar-form ml-auto mt-2 mt-lg-0">
                           tai khoan dang nhap
                        </form>
                    </div>
                </nav>

                    <div class="container">
                        <h1 class="my-4">Quản lý nhân viên</h1>
                        <?php
                        require "connett.php";

                        if (isset($_POST['tim'])) {
                            $timkiem = $_POST['timkiem'];

                            $sqli = "SELECT * FROM nhanvien WHERE ma_nv LIKE '%$timkiem%'
                                    OR ho_ten LIKE '%$timkiem%'
                                    OR chuc_vu LIKE '%$timkiem%'";

                            $result = $conn->query($sqli);
                        }
                        ?>

                        <table class="table table-bordered">
                            <thead class="thead-dark">
                            <tr>
                                <th>Mã nhân viên</th>
                                <th>Tên nhân viên</th>
                                <th>Chức vụ</th>
                                <th>Lương</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($_POST['tim'])) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                        <td>" . $row['ma_nv'] . " </td>
                                        <td>" . $row['ho_ten'] . " </td>
                                        <td>" . $row['chuc_vu'] . " </td>
                                        <td>" . $row['luong'] . "</td>
                                        <td>
                                            <a href='chitietnv.php?ma_nv=" . $row['ma_nv'] . "' class='btn btn-warning btn-sm'>chi tiết</a>
                                        </td>
                                    </tr>";
                                }
                            } else {
                                $sqli = "SELECT * FROM nhanvien";
                                $result = $conn->query($sqli);
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                        <td>" . $row['ma_nv'] . " </td>
                                        <td>" . $row['ho_ten'] . " </td>
                                        <td>" . $row['chuc_vu'] . " </td>
                                        <td>" . $row['luong'] . " </td>
                                        <td>
                                            <a href='chitietnv.php?ma_nv=" . $row['ma_nv'] . "' class='btn btn-warning btn-sm'>chi tiết</a>
                                        </td>
                                    </tr>";
                                }
                            }

                            mysqli_close($conn);
                            ?>
                            </tbody>
                        </table>
                    </div>
            </main>
        </div>
    </div>
</body>

</html>
