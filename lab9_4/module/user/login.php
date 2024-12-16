<?php
session_start();
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
include_once ROOT . "/config.php";
include_once ROOT . "/include/function.php";

$conn = db_connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = postIndex('email');
    $password = md5(postIndex('password'));

    // Kiểm tra thông tin đăng nhập
    $sql = "SELECT * FROM customers WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['customer_id'] = $user['customer_id'];
        $_SESSION['name'] = $user['name'];
        header("Location: profile.php");
        exit();
    } else {
        echo "Sai email hoặc mật khẩu!";
    }
}
?>

<!-- Form đăng nhập -->
<form method="POST" action="">
    <label>Email:</label> <input type="email" name="email" required><br>
    <label>Mật khẩu:</label> <input type="password" name="password" required><br>
    <button type="submit">Đăng nhập</button>
</form>