<?php
// Bao gồm file config.php từ ngoài thư mục include
include_once ROOT . "/config.php";  // Đảm bảo ROOT là đường dẫn gốc

// Tự động load class
function loadClass($c)
{
    include ROOT . "/classes/" . $c . ".class.php";
}

// Lấy giá trị từ $_GET với mặc định
function getIndex($index, $value = '')
{
    $data = isset($_GET[$index]) ? $_GET[$index] : $value;
    return $data;
}

// Lấy giá trị từ $_POST với mặc định
function postIndex($index, $value = '')
{
    $data = isset($_POST[$index]) ? $_POST[$index] : $value;
    return $data;
}

// Lấy giá trị từ $_REQUEST với mặc định
function requestIndex($index, $value = '')
{
    $data = isset($_REQUEST[$index]) ? $_REQUEST[$index] : $value;
    return $data;
}

// Kiểm tra đăng nhập (ví dụ thêm hàm mới)
function isLoggedIn()
{
    return isset($_SESSION['customer_id']);
}
?>