<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];

    // Tạo mảng dữ liệu và lưu sản phẩm
    $arr = array(
        "name" => $name,
    );
    $categories->add($arr);

    // Redirect
    ?>
    <script>
        window.location.href = "?mod=categories";
    </script>
    <?php
} else {

    ?>
    <h1>Add New Category</h1>
    <form action="?mod=categories&ac=add" method="POST" enctype="multipart/form-data">
        <label for="name">Category Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <button type="submit" name="submit">Add Category</button>
    </form>
    <?php
}
?>