<?php
session_start();
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
include_once ROOT . "/config.php";
include_once ROOT . "/include/function.php";

$conn = db_connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = postIndex('name');
    $email = postIndex('email');
    $password = md5(postIndex('password')); // Mã hóa mật khẩu
    $phone = postIndex('phone');
    $address = postIndex('address');

    // Kiểm tra email tồn tại
    $sql = "SELECT * FROM customers WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Email đã tồn tại!";
    } else {
        // Thêm người dùng mới
        $sql = "INSERT INTO customers (name, email, password, phone, address) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $name, $email, $password, $phone, $address);
        if ($stmt->execute()) {
            echo "Đăng ký thành công!";
            header("Location: login.php");
            exit();
        } else {
            echo "Lỗi: " . $conn->error;
        }
    }
}
?>

<!-- Form đăng ký -->
<form method="POST" action="">
    <label>Tên:</label> <input type="text" name="name" required><br>
    <label>Email:</label> <input type="email" name="email" required><br>
    <label>Mật khẩu:</label> <input type="password" name="password" required><br>
    <label>Số điện thoại:</label> <input type="text" name="phone"><br>
    <label>Địa chỉ:</label> <textarea name="address"></textarea><br>
    <button type="submit">Đăng ký</button>
</form>