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
    <title>Buổi 4 - Danh sách tài khoản (Cách 2)</title>
</head>

<body>
    <div class="container">
        <h1>Danh sách tài khoản (Cách 2: MySQLi Object-oriented)</h1>
        <table class="table table-light table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>STT</th>
                    <th>Tên tài khoản</th>
                    <th>Mật khẩu</th>
                    <th>Email</th>
                    <th>SĐT</th>
                    <th>Địa chỉ</th>
                    <th>Họ tên</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conn = new mysqli("localhost", "root", "", "WebBanHang");
                if ($conn->connect_error) {
                    exit("Kết nối tới CSDL thất bại. Lỗi: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM TaiKhoan";
                $conn->set_charset("utf8");
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $i = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $i++ . "</td>";
                        echo "<td>" . $row["TenTaiKhoan"] . "</td>";
                        echo "<td>" . $row["MatKhau"] . "</td>";
                        echo "<td>" . $row["Email"] . "</td>";
                        echo "<td>" . $row["SDT"] . "</td>";
                        echo "<td>" . $row["DiaChi"] . "</td>";
                        echo "<td>" . $row["HoTen"] . "</td>";
                        echo "</tr>";
                    }
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>