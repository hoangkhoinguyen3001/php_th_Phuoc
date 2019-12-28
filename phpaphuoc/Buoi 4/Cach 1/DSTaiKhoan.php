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
    <title>Buổi 4 - Danh sách tài khoản (Cách 1)</title>
</head>

<body>
    <div class="container">
        <h1>Danh sách tài khoản (Cách 1: MySQLi Procedural)</h1>
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
                $conn = mysqli_connect("localhost", "root", "", "WebBanHang");
                if (!$conn) {
                    exit("Kết nối tới CSDL thất bại. Lỗi: " . mysqli_connect_error($conn));
                }

                $sql = "SELECT * FROM TaiKhoan";
                mysqli_set_charset($conn, "utf8");
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows(($result)) > 0) {
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
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
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>