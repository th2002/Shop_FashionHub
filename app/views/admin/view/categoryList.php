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
    h5 {
      font-size: 18px;
      color: #333;
    }

    #current-time {
      font-size: 32px;
      color: #007bff;
      font-weight: bold;
    }
    .table{
        padding: 20px;
    }
    .category-table {
        width: 100%;
        border-collapse: collapse;
        overflow-x: auto;
        background: #f7f7f7; /* Màu nền bảng */
      box-shadow: 0 4px 8px 5px rgba(0, 0, 24, 0.8); /* Đổ bóng */
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
        padding: 8px 12px;
        text-decoration: none;
        border-radius: 4px;
        font-size: 12px;
    }
    .action-links .btn-sua{
        background-color: #007bff;
        
    }
    .action-links .btn-xoa{
        background-color: #dc3545;
    
    }


    .action-links .btn-sua:hover {
        background-color: #0056b3;
    }


    .action-links .btn-xoa:hover {
        background-color: #c82333;

    }

    .category-table .action-links a.delete:hover {
    }

    @media (max-width: 768px) {
        .category-table {
            overflow-x: scroll;
        }
    }
</style>



<?php 

$categories = getAllCategories(); 
?>
<h2 class="title">Danh mục</h2>
<h1>Thời gian hiện tại: <?php echo date('Y-m-d H:i:s'); ?></h1>
<h5>Thời gian hiện tại: <span id="current-time"></span></h5>
<h4 class="add-category"><a href="addCategory.php" class="add-links">Thêm</a></h4>
<div class="table">
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
                <a href="editCategory.php?id=<?php echo $category['id']; ?>" class="btn-sua">Sửa</a>
                <a href="deleteCategory.php?id=<?php echo $category['id']; ?>" class="btn-xoa">Xoá</a>
            </td>
        </tr>
    <?php } ?>
</table>
</div>




<!-- footer -->
<?php include_once("../parts/footer.php"); ?>
<!-- end footer -->