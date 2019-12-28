<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>VD3.1 - INSERT (MySQLi Object-oriented)</title>
</head>

<body>
    <div class="container">
        <h3>Demo câu lệnh INSERT vào CSDL WebBanHang theo cách 2: MySQLi Object-oriented</h3>
        <?php
        // Khai báo 4 thông tin: Tên máy chủ, tên đăng nhập, mật khẩu, tên CSDL
        $serverName = "localhost";
        $username = "root";
        $password = "";
        $dbName = "WebBanHang";
        // Tạo kết nối đến CSDL
        $conn = new mysqli($serverName, $username, $password, $dbName);
        if ($conn->connect_error) {
            exit("Kết nối đến CSDL thất bại. Lỗi: " . $conn->connect_error);
        }
        // Thực thi truy vấn
        $sql = "INSERT INTO GioHang (TenTaiKhoan, MaSP, SoLuong) VALUES ('admin', 'SP012', 5)";
        echo "Câu truy vấn cần thực thi: $sql<br>";
        if ($conn->query($sql)) {
            echo "Thêm dữ liệu thành công.";
        } else {
            echo "Thêm dữ liệu thất bại. Lỗi: " . $conn->error;
        }
        ?>
    </div>
</body>

</html>