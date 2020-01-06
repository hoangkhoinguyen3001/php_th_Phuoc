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
    try {
        $conn = new PDO("mysql:host=$serverName;dbname=$dbName;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        error_log("Kết nối tới CSDL $serverName/$dbName bằng tài khoản $username thất bại. Lỗi: " . $e->getMessage());
    }
}

// Hàm ExecuteSelectQuery()
// Mục đích: Thực thi truy vấn SELECT.
// Tham số: $sql là prepared statement.
//          $dataType là danh sách kiểu dữ liệu cho parameter.
//          $params là mảng chứa các tham số theo thứ tự.
// Trả về: Bảng kết quả nếu truy vấn thành công. False nếu truy vấn thất bại.
function ExecuteSelectQuery($sql, $params = null)
{
    global $conn;
    $conn = OpenConnection();
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->fetchAll();
    } catch (PDOException $e) {
        error_log("Truy vấn thất bại. Lỗi: " . $e->getMessage());
        $result = false;
    }
    $conn = null;
    return $result;
}

// Hàm ExecuteNonQuery()
// Mục đích: Thực thi truy vấn INSERT, UPDATE, DELETE.
// Tham số: $sql là prepared statement.
//          $dataType là danh sách kiểu dữ liệu cho parameter.
//          $params là mảng chứa các tham số theo thứ tự.
// Trả về: Số dòng bị ảnh hưởng nếu truy vấn thành công. False nếu truy vấn thất bại.
function ExecuteNonQuery($sql, $params = null)
{
    global $conn;
    $conn = OpenConnection();
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->rowCount();
    } catch (PDOException $e) {
        error_log("Truy vấn thất bại. Lỗi: " . $e->getMessage());
        $result = false;
    }
    $conn = null;
    return $result;
}