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
    <title>Trang chủ</title>
</head>

<body>
    <div class="container">
        <?php
        if (count($_POST) > 0) {
        ?>
        <span>
            Cảm ơn bạn đã đăng kí tài khoản. Thông tin tài khoản của bạn như sau:
            <ul>
                <li>Tên tài khoản: <?php echo $_POST["tenTK"]; ?></li>
                <li>Mật khẩu: <?php echo $_POST["mk"]; ?></li>
                <li>Email: <?php echo $_POST["email"]; ?></li>
                <li>Họ tên: <?php echo $_POST["hoTen"]; ?></li>
                <li>SĐT: <?php echo $_POST["sdt"]; ?></li>
                <li>Nghề nghiệp:
                    <?php switch ($_POST["ngheNghiep"]) {
                            case "hssv":
                                echo "Học sinh - Sinh viên";
                                break;
                            case "gv":
                                echo "Giáo viên";
                                break;
                            case "cn":
                                echo "Công nhân";
                                break;
                            default:
                                echo "Khác";
                        };
                        ?>
                </li>
                <li>Giới tính: <?php echo $_POST["gioiTinh"] == "nam" ? "Nam" : "Nữ"; ?></li>
            </ul>
        </span>
        <?php
        } else {
        ?>
        <p>Bạn chưa đăng kí. Vui lòng đăng <a href="DangKi.php">tại đây</a></p>
        <?php
        }
        ?>
    </div>
</body>

</html>