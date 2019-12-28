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
    <title>Buổi 3 - Đăng kí tài khoản</title>
</head>

<body>
    <div class="container">
        <h1 id="lblDangKi">Đăng kí tài khoản</h1>
        <?php
        if (isset($_POST["tenTK"])) {
            // Lấy thông tin người dùng submit
            $tenTK = $_POST["tenTK"];
            $mk = $_POST["mk"];
            $email = $_POST["email"];
            $hoTen = $_POST["hoTen"];
            $sdt = $_POST["sdt"];
            $diaChi = $_POST["diaChi"];

            // Kết nối CSDL
            $conn = new mysqli("localhost", "root", "", "WebBanHang");
            if ($conn->connect_error) {
                exit("Kết nối tới CSDL thất bại. Lỗi: " . $conn->connect_error);
            }

            // Thực thi truy vấn: Kiểm tra tên tài khoản đã tồn tại hay chưa
            $sql = "SELECT COUNT(*) AS SoLuong FROM TaiKhoan WHERE TenTaiKhoan = '$tenTK'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if ($row["SoLuong"] == 0) {
                // Thực thi truy vấn: INSERT tài khoản vào CSDL
                $sql = "INSERT INTO TaiKhoan VALUES ('$tenTK', '$mk', '$email', '$sdt', '$diaChi', '$hoTen', 0, '', 1);";
                $conn->set_charset("utf8");
                if ($conn->query($sql)) {
                    echo "Đăng kí thành công. Nhấn vào <a href='DangNhap.php'>đây</a> để đăng nhập.";
                } else {
                    echo "Đăng kí thất bại. Lỗi: " . $conn->error;
                }
            } else {
                echo "Tên tài khoản đã có người sử dụng. Vui lòng chọn tên tài khoản khác.";
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