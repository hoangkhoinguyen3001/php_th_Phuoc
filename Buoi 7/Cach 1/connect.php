<?php
$conn;

// Hàm OpenConnection()
// Mục đích: Mở kết nối tới CSDL.
// Tham số: Không có.
// Trả về: Kết nối vừa tạo.
function OpenConnection()
{
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $dbName = "WebBanHang";
    global $conn;
    $conn = mysqli_connect($serverName, $username, $password, $dbName);
    mysqli_set_charset($conn, "utf8");
    if (!$conn) {
        error_log("Kết nối tới CSDL $serverName/$dbName bằng tài khoản $username thất bại. Lỗi: " . $conn->connect_error);
        exit();
    }
    return $conn;
}

// Hàm ExecuteSelectQuery()
// Mục đích: Thực thi truy vấn SELECT.
// Tham số: $sql là prepared statement.
//          $dataType là danh sách kiểu dữ liệu cho parameter.
//          $params là mảng chứa các tham số theo thứ tự.
// Trả về: Bảng kết quả nếu truy vấn thành công. False nếu truy vấn thất bại.
function ExecuteSelectQuery($sql, $dataType = null, $params = null)
{
    global $conn;
    $conn = OpenConnection();
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    if ($dataType && $params) {
        mysqli_stmt_bind_param($stmt, $dataType, ...$params);
    }
    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
    } else {
        error_log("Truy vấn thất bại. Lỗi: " . $stmt->error);
        $result = false;
    }
    mysqli_close($conn);
    return $result;
}

// Hàm ExecuteNonQuery()
// Mục đích: Thực thi truy vấn INSERT, UPDATE, DELETE.
// Tham số: $sql là prepared statement.
//          $dataType là danh sách kiểu dữ liệu cho parameter.
//          $params là mảng chứa các tham số theo thứ tự.
// Trả về: Số dòng bị ảnh hưởng nếu truy vấn thành công. False nếu truy vấn thất bại.
function ExecuteNonQuery($sql, $dataType = null, $params = null)
{
    global $conn;
    $conn = OpenConnection();
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    if ($dataType && $params) {
        mysqli_stmt_bind_param($stmt, $dataType, ...$params);
    }
    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_affected_rows($stmt);
    } else {
        error_log("Truy vấn thất bại. Lỗi: " . $stmt->error);
        $result = false;
    }
    mysqli_close($conn);
    return $result;
}