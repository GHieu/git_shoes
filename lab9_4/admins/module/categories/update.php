<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_id = $_POST["category_id"];
    $name = $_POST["name"];


    $arr = [
        "category_id" => $category_id,
        "name" => $name,
    ];

    $categories->Update($arr);
    ?>
<script>
window.location.href = "?mod=categories";
</script>
<?php
} else {
    // Lấy category_id từ URL
    $category_id = isset($_GET["id"]) ? $_GET["id"] : 0; // Lấy từ tham số id trong URL

    // Truy vấn thông tin sản phẩm từ database
    $category = $categories->getById($category_id); // Hàm `getById` cần được định nghĩa

    // Kiểm tra nếu sản phẩm không tồn tại
    if (!$category) {
        ?>
<p style='color: red;'>Danh mục cần cập nhật dữ liệu không tìm thấy</p>
<?php
        exit;
    }
    ?>

<h1>Update category</h1>
<form action="?mod=categories&ac=update" method="POST" enctype="multipart/form-data">
    <!-- Hidden field chứa product_id -->
    <input type="hidden" name="category_id" value="<?php echo $category["category_id"]; ?>">

    <label for="name">Product Name:</label><br>
    <input type="text" id="name" name="name" value="<?php echo $category["name"]; ?>" required><br><br>

    <button type="submit" name="submit">Update Product</button>
</form>
<?php
}
?>