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
    <title>Buổi 7 - Đăng kí tài khoản (Cách 1: MySQLi Procedural)</title>
</head>

<body>
    <?php require "connect.php"; ?>
    <div class="container">
        <h3 id="lblDangKi">Đăng kí tài khoản (Cách 1: MySQLi Procedural)</h3>
        <?php
        if (isset($_POST["tenTK"])) {
            // Lấy thông tin người dùng submit
            $tenTK = $_POST["tenTK"];
            $mk = $_POST["mk"];
            $email = $_POST["email"];
            $sdt = $_POST["sdt"];
            $diaChi = $_POST["diaChi"];
            $hoTen = $_POST["hoTen"];

            // Kiểm tra tên tài khoản tồn tại
            $sql = "SELECT COUNT(*) AS SoLuong FROM TaiKhoan WHERE TenTaiKhoan = ?";
            $dataType = "s";
            $params = array($tenTK);
            $result = ExecuteSelectQuery($sql, $dataType, $params)->fetch_assoc()["SoLuong"];
            if ($result == 0) {
                // Thêm tài khoản vào CSDL
                $sql = "INSERT INTO TaiKhoan VALUES (?, ?, ?, ?, ?, ?, 0, '', 1)";
                $dataType = "ssssss";
                $params = array($tenTK, $mk, $email, $sdt, $diaChi, $hoTen);
                $result = ExecuteNonQuery($sql, $dataType, $params);
                if ($result > 0) {
                    echo "Đăng kí thành công. Nhấn vào <a href='DangNhap.php'>đây</a> để đăng nhập.";
                } else {
                    echo "Đăng kí thất bại.";
                }
            } else {
                echo "Tài khoản đã có người sử dụng. Nhấn vào <a href='DangKi.php'>đây</a> để nhập lại.";
            }
        } else {
        ?>
        <form method="post">
            <fieldset id="fldTK">
                <legend>Thông tin tài khoản (bắt buộc)</legend>
                <div class="form-group">
                    <label for="txtTenTK">Tên tài khoản</label>
                    <input id="txtTenTK" class="form-control" type="text" name="tenTK" autofocus required>
                </div>
                <div class="form-group">
                    <label for="txtMK">Mật khẩu</label>
                    <input id="txtMK" class="form-control" type="password" name="mk" required>
                </div>
                <div class="form-group">
                    <label for="txtMK2">Xác nhận mật khẩu</label>
                    <input id="txtMK2" class="form-control" type="password" required>
                </div>
                <div class="form-group">
                    <label for="txtEmail">Email</label>
                    <input id="txtEmail" class="form-control" type="email" name="email" required>
                </div>
                <div class="form-group float-right">
                    <button id="btnNext" class="btn btn-primary" type="button">Thông tin cá nhân <i
                            class="fa fa-arrow-right" aria-hidden="true"></i></button>
                </div>
            </fieldset>
            <fieldset id="fldCN">
                <legend>Thông tin cá nhân</legend>
                <div class="form-group">
                    <label for="txtHoTen">Họ tên</label>
                    <input id="txtHoTen" class="form-control" type="text" name="hoTen">
                </div>
                <div class="form-group">
                    <label for="txtSDT">SĐT</label>
                    <input id="txtSDT" class="form-control" type="text" name="sdt">
                </div>
                <div class="form-group">
                    <label for="txtDiaChi">Địa chỉ</label>
                    <input id="txtDiaChi" class="form-control" type="text" name="diaChi">
                </div>
                <div class="form-group float-right">
                    <button class="btn btn-success" type="submit"><i class="fa fa-check" aria-hidden="true"></i> Đăng
                        kí</button>
                    <button class="btn btn-danger" type="reset"><i class="fa fa-times" aria-hidden="true"></i> Hủy
                        bỏ</button>
                    <button id="btnPrevious" class="btn btn-primary" type="button"><i class="fa fa-arrow-left"
                            aria-hidden="true"></i> Thông tin tài khoản</button>
                </div>
            </fieldset>
        </form>
        <?php
        }
        ?>
    </div>
</body>

</html>