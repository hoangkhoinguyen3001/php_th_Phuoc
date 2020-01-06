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
    <title>Đăng kí tài khoản</title>
</head>

<body>
    <div class="container">
        <h1 id="lblDangKi">Đăng kí tài khoản</h1>
        <form action="index.php" method="POST">
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
                    <label for="cboNgheNghiep">Nghề nghiệp</label>
                    <select id="cboNgheNghiep" class="custom-select" name="ngheNghiep">
                        <option value="hssv">Học sinh - Sinh viên</option>
                        <option value="gv">Giáo viên</option>
                        <option value="cn">Công nhân</option>
                        <option value="khac">Khác</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="mr-3">Giới tính</label>
                    <div class="custom-control custom-control-inline custom-radio">
                        <input type="radio" class="custom-control-input" id="radNam" name="gioiTinh" value="nam"
                            checked>
                        <label class="custom-control-label" for="radNam"> Nam</label>
                    </div>
                    <div class="custom-control custom-control-inline custom-radio">
                        <input type="radio" class="custom-control-input" id="radNu" name="gioiTinh" value="nu">
                        <label class="custom-control-label" for="radNu"> Nữ</label>
                    </div>
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
    </div>
</body>

</html>