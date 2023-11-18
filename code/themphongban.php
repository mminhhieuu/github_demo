<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Quản lý nhân sự</title>
    <style>
        /* CSS cho form */
        body {
            font-family: Arial, sans-serif;
        }

        h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            background-color: gray;
            padding: 30px;
            margin: 90px;
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            margin: 15px 0;
            color: yellow;
        }

        input.form-control {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <center>
        <form method="POST" action="">
            <h3>
                <span>THÊM THÔNG TIN PHÒNG BAN</span>
            </h3>
            <table>
                <tr>
                    <td><label for="ma_pb">Mã phòng ban: </label></td>
                    <td><input type="text" class="form-control" id="ma_pb" name="ma_pb" required></td>
                </tr>
                <tr>
                    <td><label for="phong_ban">Tên phòng ban: </label></td>
                    <td><input type="text" class="form-control" id="phong_ban" name="phong_ban" required></td>
                </tr>
                <tr>
                    <td><label for="email">Email: </label></td>
                    <td><input type="email" class="form-control" id="email" name="email" required></td>
                </tr>
                <tr>
                    <td><label for="ghi_chu">Ghi chú: </label></td>
                    <td><input type="text" class="form-control" id="ghi_chu" name="ghi_chu" required></td>
                </tr>
                <tr>
                    <td><input type="submit" name="thempb" value="Thêm" class="btn btn-primary"></td>
                </tr>
            </table>
        </form>
    </center>

    <?php
    ob_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "web_nhom2";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        echo "Connection failed: " . $conn->connect_error;
    }

    if (isset($_POST['ma_pb'], $_POST['phong_ban'], $_POST['email'], $_POST['ghi_chu'])) {
        $ma_pb = $_POST['ma_pb'];
        $phong_ban = $_POST['phong_ban'];
        $email = $_POST['email'];
        $ghi_chu = $_POST['ghi_chu'];

        $sql = "INSERT INTO phongban (ma_pb, phong_ban, email, ghi_chu) VALUES ('$ma_pb', '$phong_ban', '$email', '$ghi_chu')";

        if ($conn->query($sql) === TRUE) {
            header('Location:../code/dsphongban.php');
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    }

    ob_end_flush();
    $conn->close();
    ?>
</body>

</html>
