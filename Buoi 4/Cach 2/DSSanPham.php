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
    <title>Buổi 4 - Danh sách sản phẩm (Cách 2)</title>
</head>

<body>
    <div class="container">
        <h1>Danh sách sản phẩm (Cách 2: MySQLi Object-oriented)</h1>
        <form action="" method="get">
            <div class="row">
                <?php
                $conn = new mysqli("localhost", "root", "", "WebBanhang");
                if ($conn->connect_error) {
                    exit("Kết nối tới CSDL thất bại. Lỗi: " . $conn->connect_error);
                }
                $sql = "SELECT * FROM SanPham WHERE SoLuongTonKho > 0 AND TrangThai = 1";
                $conn->set_charset("utf8");
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-3">
                    <div class="card border-0 mb-1" style="height: 100%;">
                        <img class=" card-img-top" src="img/product/<?php echo $row['AnhMinhHoa']; ?>" alt="">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row["TenSP"]; ?></h5>
                            <p class="card-text">Tác giả: <?php echo $row["ThongTin"]; ?></p>
                            <p class="card-text">Giá bán: <?php echo number_format($row["GiaTien"]); ?>đ</p>
                        </div>
                        <div class="card-footer border-0 bg-white">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-money-check-alt"
                                    aria-hidden="true"></i> Mua</button>
                            <button class="btn btn-success" type="submit"><i class="fas fa-cart-plus"
                                    aria-hidden="true"></i>
                                Thêm</button>
                        </div>
                    </div>
                </div>
                <?php
                    }
                }
                $conn->close();
                ?>
            </div>
        </form>
    </div>
</body>

</html>