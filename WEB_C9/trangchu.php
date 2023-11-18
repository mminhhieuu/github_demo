<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Quản lý nhân sự</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8
    gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
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
                                        <a href="thempb.php">Thêm phong ban </a>
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
                                <input type="text" name="timkiem" class="form-control" placeholder="Tìm kiếm..." required>
                                <div class="input-group-append">
                                    <button type="submit" name="tim" class="btn btn-primary">Tìm</button>
                                </div>
                            </div>
                        </form>
                        <form method="POST" action="" class="navbar-form ml-auto mt-4 mt-lg-0">
                           tai khoan dang nhap
                        </form>
                    </div>
                </nav>

                <div class="container mt-4">
                <form method="POST" action="">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
            <h3 class="text-center mb-4">
                    <span class="btn-highlight">Thêm thông tin phòng ban</span>
            </h3>
                <div class="form-group col-md-12">
                    <label for="ma_pb">Mã phòng ban</label>
                    <input type="text" class="form-control" id="ma_pb" name="ma_pb" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="phong_ban">Tên phòng ban</label>
                    <input type="text" class="form-control" id="phong_ban" name="phong_ban" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="ghi_chu">Ghi chú</label>
                    <input type="text" class="form-control" id="ghi_chu" name="ghi_chu" required>
                </div>
                <div class="form-group col-md-12">
                 <center> <input type="submit" name="thempb" value="Thêm" class="btn btn-primary"></center>  
                </div>
            </div>
        </div>
    </div>
</form>


</body>

</html>