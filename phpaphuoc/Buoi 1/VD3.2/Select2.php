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
    <title>VD3.2 - SELECT (MySQLi Object-oriented)</title>
</head>

<body>
    <div class="container">
        <h3>Demo câu lệnh SELECT từ CSDL WebBanHang theo cách 2: MySQLi Object-oriented</h3>
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
        $sql = "SELECT TenTaiKhoan, Email, HoTen FROM TaiKhoan";
        echo "Câu truy vấn cần thực thi: $sql<br>";
        $conn->set_charset("utf8");         // Chuyển bảng mã về UTF-8 (Unicode) để SELECT được tiếng Việt
        $result = $conn->query($sql);       // Lưu kết quả vào mảng $result là mảng 2 chiều
        if ($result->num_rows > 0) {        // Kiểm tra mảng $result có dữ liệu hay không
            // Tạo <table> để hiển thị kết quả
        ?>
        <table class="table table-light table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Họ tên</th>
                    <th>Tên tài khoản</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Đọc từng dòng trong mảng $result, lưu vào $row là 1 mảng liên hợp
                    while ($row = $result->fetch_assoc()) {
                    ?>
                <tr>
                    <td><?php echo $row["HoTen"]; ?></td>
                    <td><?php echo $row["TenTaiKhoan"]; ?></td>
                    <td><?php echo $row["Email"]; ?></td>
                </tr>
                <?php
                    }
                    ?>
            </tbody>
        </table>
        <?php
        } else {
            echo "Không có dữ liệu.";
        }
        ?>
    </div>
</body>

</html>