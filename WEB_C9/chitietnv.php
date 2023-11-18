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
                            <center><img src="https://taoanhdep.com/wp-content/uploads/2022/08/logo-mascot-anonymous.jpeg"
                                alt="nhóm 2" width="50%" height="50%"></center>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="trangchu.php">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="danhsachnv.php">Danh sách nhân viên</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="themnv.php">Thêm nhân viên</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="danhsachpb.php">Phòng ban</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="thempb.php">Thêm phòng ban</a>
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
                            Tài khoản đăng nhập
                        </form>
                    </div>
                </nav>
                <?php
                require "connett.php";
                if (isset($_GET["ma_nv"])) {
                    $ma_nv = $_GET["ma_nv"];
                    $sqli = "SELECT * FROM nhanvien WHERE ma_nv ='$ma_nv'";
                    $qr = $conn->query($sqli);
                    while ($row = $qr->fetch_assoc()) {
                       
                        $imageData = base64_encode($row['image']);
                ?>
                        <div class="container">
                            <center>
                                <h2 class="mb-4">Chi tiết nhân viên</h2>
                            </center>
                            <div class="row">
                                <form method="POST" action="" enctype="multipart/form-data" class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-row">
                                                <div class="form-group col-md-9">
                                                    <label for="ma_nv">Mã nhân viên:</label>
                                                    <input type="text" name="ma_nv" id="ma_nv" class="form-control" value="<?php echo $row['ma_nv']; ?>" required>
                                                </div>
                                                <div class="form-group col-md-9">
                                                    <label for="ho_ten">Họ tên:</label>
                                                    <input type="text" name="ho_ten" id="ho_ten" class="form-control" value="<?php echo $row['ho_ten']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-9">
                                                    <label for="ten_dn">Tên đăng nhập:</label>
                                                    <input type="text" name="ten_dn" id="ten_dn" class="form-control" value="<?php echo $row['ten_dn']; ?>" required>
                                                </div>
                                                <div class="form-group col-md-9">
                                                    <label for="mat_khau">Mật khẩu:</label>
                                                    <input type="text" name="mat_khau" id="mat_khau" class="form-control" value="<?php echo $row['mat_khau']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-9">
                                                    <label for="gioi_tinh">Giới tính:</label>
                                                    <select name="gioi_tinh" id="gioi_tinh" class="form-control" required>
                                                        <option value="Nam" <?php if ($row['gioi_tinh'] === 'Nam') echo 'selected'; ?>>Nam</option>
                                                        <option value="Nữ" <?php if ($row['gioi_tinh'] === 'Nữ') echo 'selected'; ?>>Nữ</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-9">
                                                    <label for="dien_thoai">Điện thoại:</label>
                                                    <input type="text" name="dien_thoai" id="dien_thoai" class="form-control" value="<?php echo $row['dien_thoai']; ?>" required>
                                                </div>
                                                <div class="form-group col-md-9">
                                                    <label for="email">Email:</label>
                                                    <input type="email" name="email" id="email" class="form-control" value="<?php echo $row['email']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-9">
                                                    <label for="trinh_do">Trình độ:</label>
                                                    <input type="text" name="trinh_do" id="trinh_do" class="form-control" value="<?php echo $row['trinh_do']; ?>" required>
                                                </div>
                                                <div class="form-group col-md-9">
                                                    <label for="cccd">Căn cước công dân:</label>
                                                    <input type="text" name="cccd" id="cccd" class="form-control" value="<?php echo $row['cccd']; ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-row">
                                                <div class="form-group col-md-9">
                                                    <label for="dia_chi">Địa chỉ:</label>
                                                    <input type="text" name="dia_chi" id="dia_chi" class="form-control" value="<?php echo $row['dia_chi']; ?>" required>
                                                </div>
                                                <div class="form-group col-md-9">
                                                    <label for="chuc_vu">Chức vụ:</label>
                                                    <input type="text" name="chuc_vu" id="chuc_vu" class="form-control" value="<?php echo $row['chuc_vu']; ?>" required>
                                                </div>
                                                <div class="form-group col-md-9">
                                                    <label for="bo_phan">Bộ phận:</label>
                                                    <input type="text" name="bo_phan" id="bo_phan" class="form-control" value="<?php echo $row['bo_phan']; ?>" required>
                                                </div>
                                                <div class="form-group col-md-9">
                                                    <label for="luong">Lương:</label>
                                                    <input type="text" name="luong" id="luong" class="form-control" value="<?php echo $row['luong']; ?>" required>
                                                </div>
                                                <div class="form-group col-md-9">
                                                    <label for="image">Ảnh nhân viên:</label>
                                                   
                                                </div>
                                                <div class="form-group col-md-9">
                                                    <img id="preview" src="data:<?php echo $imageType; ?>;base64,<?php echo $imageData; ?>" alt="Ảnh nhân viên" style="max-width: 100%; max-height: 200px;">
                                                    <div class="form-row">
                                                <div class="form-group col-md-9">
                                                    <a href='suattnv.php?ma_nv=<?php echo $row['ma_nv']; ?>' class='btn btn-primary btn-sm'>Sửa</a> 
                                                    <a href='xoanv.php?ma_nv=<?php echo $row['ma_nv']; ?>' class='btn btn-danger btn-sm ' onclick='return confirm("Bạn có chắc muốn xóa")'>Xóa</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                <?php
                    }
                    mysqli_close($conn);
                }
                ?>
            </main>
        </div>
    </div>
</body>

</html>
