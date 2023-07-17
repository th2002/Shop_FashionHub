<!-- header  -->
<?php
include_once("../parts/header.php");
?>
<!-- end header -->

<!-- slidebar -->
<?php include_once("../parts/slidebar.php"); ?>
<!-- slidebar -->
<style>
    .add-category{
        padding: 20px;

    }
    .add-links{
        background-color: #007bff;
        color: #fff;
        font-weight: 500;

        padding:8px 12px;
        border-radius: 4px;
       
    }
    .add-links:hover{
        background-color: #0056b3;

      
    }
    
    .category-table {
        width: 100%;
        border-collapse: collapse;
        overflow-x: auto;
    }

    .category-table th,
    .category-table td {
        padding: 12px 15px;
        text-align: left;
        border: 1px solid #ccc;
        font-size: 14px;
    }

    .category-table th {
        background-color: #f8f8f8;
        font-weight: bold;
    }

    .category-table td {
        background-color: #fff;
    }

    .category-table .action-links a {
        display: inline-block;
        margin-right: 5px;
        color: #fff;
        background-color: #007bff;
        padding: 8px 12px;
        text-decoration: none;
        border-radius: 4px;
        font-size: 12px;
    }

    .category-table .action-links a:hover {
        background-color: #0056b3;
    }

    .category-table .action-links a.delete {
        background-color: #dc3545;
    }

    .category-table .action-links a.delete:hover {
        background-color: #c82333;
    }

    @media (max-width: 768px) {
        .category-table {
            overflow-x: scroll;
        }
    }
</style>



<?php 
require_once '../models/CategoryModel.php';

$categories = getAllCategories(); 
?>
<h2 class="title">Danh mục</h2>
<h4 class="add-category"><a href="" class="add-links">Thêm</a></h4>
<table class="category-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Tên danh mục</th>
            <th>Slug</th>
            <th>Banner</th>
            <th>Ngày tạo</th>
            <th>Ngày cập nhật</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <?php foreach ($categories as $category) { ?>
        <tr>
            <td><?php echo $category['id']; ?></td>
            <td><?php echo $category['cate_name']; ?></td>
            <td><?php echo $category['cate_slug']; ?></td>
            <td><?php echo $category['cate_banner']; ?></td>
            <td><?php echo $category['create_at']; ?></td>
            <td><?php echo $category['update_at']; ?></td>
            <td class="action-links">
                <a href="editCategory.php?id=<?php echo $category['id']; ?>" class="btn">Sửa</a>
                <a href="deleteCategory.php?id=<?php echo $category['id']; ?>" class="btn">Xoá</a>
            </td>
        </tr>
    <?php } ?>
</table>



<!-- footer -->
<?php include_once("../parts/footer.php"); ?>
<!-- end footer -->