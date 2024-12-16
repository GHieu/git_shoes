<?php
$configDB = array();
$configDB["host"] = "localhost";
$configDB["database"] = "webgiay";
$configDB["username"] = "root";
$configDB["password"] = "";

// Định nghĩa các hằng số cấu hình
define("HOST", "localhost");
define("DB_NAME", "webgiay");
define("DB_USER", "root");
define("DB_PASS", "");
define('ROOT', dirname(dirname(__FILE__)));
// Thư mục tuyệt đối trước của config; ví dụ: c:/wamp/www/lab/
define("BASE_URL", "http://" . $_SERVER['SERVER_NAME'] . "/lab/"); // Địa chỉ website

// Hàm kết nối cơ sở dữ liệu
function db_connect()
{
    // Sửa "localhost" thành chuỗi có dấu nháy kép
    $conn = new mysqli(HOST, DB_USER, DB_PASS, DB_NAME);

    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Thiết lập charset để hỗ trợ tiếng Việt
    $conn->set_charset("utf8mb4");

    return $conn;
}

// Kiểm tra trạng thái đăng nhập
function isLoggedIn()
{
    return isset($_SESSION['customer_id']);
}
?>