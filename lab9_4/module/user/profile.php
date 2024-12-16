<?php
session_start();
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
include_once ROOT . "/config.php";
include_once ROOT . "/include/function.php";

if (!isLoggedIn()) {
    header("Location: login.php");
    exit();
}

$conn = db_connect();
$customer_id = $_SESSION['customer_id'];

// Xử lý cập nhật thông tin
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = postIndex('name');
    $phone = postIndex('phone');
    $address = postIndex('address');

    $sql = "UPDATE customers SET name = ?, phone = ?, address = ? WHERE customer_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $name, $phone, $address, $customer_id);
    if ($stmt->execute()) {
        $_SESSION['name'] = $name;
        echo "Cập nhật thành công!";
    } else {
        echo "Lỗi: " . $conn->error;
    }
}

// Lấy thông tin người dùng
$sql = "SELECT * FROM customers WHERE customer_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $customer_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
?>

<!-- Hiển thị và chỉnh sửa thông tin -->
<h1>Chào, <?php echo htmlspecialchars($_SESSION['name']); ?></h1>
<form method="POST" action="">
    <label>Tên:</label> <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>"
        required><br>
    <label>Số điện thoại:</label> <input type="text" name="phone"
        value="<?php echo htmlspecialchars($user['phone']); ?>"><br>
    <label>Địa chỉ:</label> <textarea name="address"><?php echo htmlspecialchars($user['address']); ?></textarea><br>
    <button type="submit">Cập nhật</button>
</form>
<a href="logout.php">Đăng xuất</a>