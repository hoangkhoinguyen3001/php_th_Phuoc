<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <title>Buổi 7 - Đăng nhập (Cách 1: MySQLi Procedural)</title>
</head>

<body>
    <?php require "connect.php"; ?>
    <div class="container">
        <h3 id="lblDangNhap">Đăng nhập (Cách 1: MySQLi Procedural)</h3>
        <?php
        if (isset($_POST["tenTK"])) {
            // Lấy thông tin người dùng submit
            $tenTK = $_POST["tenTK"];
            $mk = $_POST["mk"];

            $sql = "SELECT MatKhau, HoTen FROM TaiKhoan WHERE TenTaiKhoan = ?";
            $dataType = "s";
            $params = array($tenTK);
            $result = ExecuteSelectQuery($sql, $dataType, $params);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                if ($mk == $row["MatKhau"]) {
                    echo "Xin chào " . $row["HoTen"] . ".";
                } else {
                    echo "Đăng nhập thất bại.";
                }
            } else {
                echo "Đăng nhập thất bại.";
            }
        } else {
        ?>
        <form method="post">
            <div class="form-group">
                <label for="txtTenTK">Tên tài khoản</label>
                <input id="txtTenTK" class="form-control" type="text" name="tenTK">
            </div>
            <div class="form-group">
                <label for="txtMK">Mật khẩu</label>
                <input id="txtMK" class="form-control" type="password" name="mk">
            </div>
            <button class="btn btn-success" type="submit"><i class="fa fa-check" aria-hidden="true"></i> Đăng
                nhập</button>
            <button class="btn btn-danger" type="reset"><i class="fa fa-times" aria-hidden="true"></i> Hủy
                bỏ</button>
        </form>
        <?php
        }
        ?>
    </div>
</body>

</html>