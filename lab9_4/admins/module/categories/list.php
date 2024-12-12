<?php
$listcategories = $categories->Joinproducts();
?>
<!-- Danh sách danh mục -->
<div class="container my-5">
    <h1 class="text-center text-primary mb-4">Category List</h1>
    <table class="table table-striped table-hover table-bordered">
        <thead class="table-primary">
            <tr>
                <th scope="col">Category ID</th>
                <th scope="col">Name</th>
                <th scope="col">Số lượng sản phẩm</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listcategories as $row) { ?>
            <tr>
                <td><?= $row['category_id']; ?></td>
                <td><?= htmlspecialchars($row['name']); ?></td>
                <td>Có <?= $row['quantity']; ?> sản phẩm trong danh mục này</td>
                <td>
                    <a class="btn btn-danger btn-sm"
                        href="?mod=categories&ac=delete&id=<?= $row['category_id']; ?>">Xóa</a>
                    <a class="btn btn-warning btn-sm"
                        href="?mod=categories&ac=update&id=<?= $row['category_id']; ?>">Sửa</a>
                </td>

            </tr>
            <tr>
                <ul>
                    <li><a href="">1</a></li>
                    <li><a href="">2</a></li>
                    <li><a href="">3</a></li>
                    <li><a href="">4</a></li>
                </ul>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="?mod=categories&ac=add"><button class="w-100 bg-primary">Thêm</button></a>
</div>