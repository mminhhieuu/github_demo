<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_nhom2";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ma_pb = $_POST['ma_pb'];
    $phong_ban = $_POST['phong_ban'];
    $email = $_POST['email'];
    $ghi_chu = $_POST['ghi_chu'];

    $sql = "UPDATE phongban SET phong_ban = ?, email = ?, ghi_chu = ? WHERE ma_pb = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $phong_ban, $email, $ghi_chu, $ma_pb);

    if ($stmt->execute()) {
        header("Location:../code/dsphongban.php");
        exit();
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
}

$ma_pb = $_GET['ma_pb'];

$sql = "SELECT * FROM phongban WHERE ma_pb = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $ma_pb);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $ma_pb = $row['ma_pb'];
    $phong_ban = $row['phong_ban'];
    $email = $row['email'];
    $ghi_chu = $row['ghi_chu'];
} else {
    echo "Không tìm thấy phòng ban";
    exit();
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Chỉnh sửa phòng ban</title>
    <style>
        /* CSS cho form chỉnh sửa */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h2 {
            background-color: #333;
            color: white;
            padding: 10px;
        }

        form {
            background-color: gray;
            padding: 60px;
            margin: 130px;
            border-radius: 5px;
            margin-top: 20px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            margin: 15px 0;
            color: yellow;
        }

        input[type="text"],
        input[type="email"] {
            width: 25%;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: green;
            color: white;
            padding: 10px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: blue;
        }
    </style>
</head>
<body>
    <center>
    <h2>Chỉnh sửa phòng ban</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="ma_pb" value="<?php echo $ma_pb; ?>">

        <label for="phong_ban">Tên phòng ban:</label>
        <input type="text" name="phong_ban" value="<?php echo $phong_ban; ?>"><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $email; ?>"><br><br>

        <label for="ghi_chu">Ghi chú:</label>
        <input type="text" name="ghi_chu" value="<?php echo $ghi_chu; ?>"><br><br>

        <input type="submit" value="Lưu">
    </form>
    </center>
</body>
</html>
