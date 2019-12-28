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
    <title>VD3.2 - SELECT (MySQLi Procedural)</title>
</head>

<body>
    <div class="container">
        <h3>Demo câu lệnh SELECT từ CSDL WebBanHang theo cách 1: MySQLi Procedural</h3>
        <?php
        // Khai báo 4 thông tin: Tên máy chủ, tên đăng nhập, mật khẩu, tên CSDL
        $serverName = "localhost";
        $username = "root";
        $password = "";
        $dbName = "WebBanHang";
        // Tạo kết nối đến CSDL
        $conn = mysqli_connect($serverName, $username, $password, $dbName);
        if (!$conn) {
            exit("Kết nối đến CSDL thất bại. Lỗi: " . mysqli_connect_error($conn));
        }
        // Thực thi truy vấn
        $sql = "SELECT TenTaiKhoan, Email, HoTen FROM TaiKhoan";
        echo "Câu truy vấn cần thực thi: $sql<br>";
        mysqli_set_charset($conn, "utf8");      // Chuyển bảng mã về UTF-8 (Unicode) để SELECT được tiếng Việt
        $result = mysqli_query($conn, $sql);    // Lưu kết quả vào mảng $result là mảng 2 chiều
        if (mysqli_num_rows($result) > 0) {         // Kiểm tra mảng $result có dữ liệu hay không
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
                    while ($row = mysqli_fetch_assoc($result)) {
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