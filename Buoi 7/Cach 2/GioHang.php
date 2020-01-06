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
    <title>Buổi 7 - Giỏ hàng (Cách 2: MySQLi Object-oriented)</title>
    <style>
    .table>tbody>tr>td {
        vertical-align: middle;
    }
    </style>
</head>

<body>
    <?php require "connect.php"; ?>
    <div class="container">
        <h3>Giỏ hàng của admin (Cách 2: MySQLi Object-oriented)</h3>
        <?php
        $sql = "SELECT * FROM GioHang gh INNER JOIN SanPham sp ON gh.MaSP = sp.MaSP WHERE TenTaiKhoan = ?";
        $dataType = "s";
        $params = array("admin");
        $result = ExecuteSelectQuery($sql, $dataType, $params);
        if ($result->num_rows > 0) {
            $sum = 0;
        ?>
        <table class="table table-light text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Ảnh minh họa</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($row = $result->fetch_assoc()) {
                        $sum += $row["GiaTien"] * $row["SoLuong"];
                    ?>
                <tr>
                    <td class="align-middle"><img src="img/product/<?php echo $row["AnhMinhHoa"]; ?>"
                            style="width: 60px;"></td>
                    <td><?php echo $row["TenSP"]; ?></td>
                    <td><?php echo $row["SoLuong"]; ?></td>
                    <td><?php echo number_format($row["GiaTien"]) . " VNĐ"; ?></td>
                    <td><?php echo number_format($row["SoLuong"] * $row["GiaTien"]) . " VNĐ"; ?></td>
                </tr>
                <?php
                    }
                    ?>
            </tbody>
            <tfoot class="table-dark">
                <tr class="font-weight-bold">
                    <td colspan="4" class="text-right">Tổng tiền:</td>
                    <td><?php echo number_format($sum) . " VNĐ"; ?></td>
                </tr>
            </tfoot>
        </table>
        <form action="" method="post">
            <div class="form-group float-right">
                <button class="btn btn-success" type="submit" name="action" value="pay"><i class="fa fa-check"
                        aria-hidden="true"></i>
                    Thanh toán</button>
                <button class="btn btn-danger" type="submit" name="action" value="deleteCart"><i class="fa fa-times"
                        aria-hidden="true"></i> Xóa
                    giỏ hàng</button>
            </div>
        </form>
        <?php
        } else {
            echo "Giỏ hàng hiện đang trống.";
        }
        ?>
    </div>
</body>

</html>