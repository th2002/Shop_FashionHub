<!-- header -->
<?php include_once("../parts/header.php"); ?>
<!-- end header -->

<!-- slidebar -->
<?php include_once("../parts/slidebar.php"); ?>
<!-- slidebar -->
<?php
// require_once  ("../models/CategoryModel.php");

?>
<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $code = $_POST['code'];
    $type = $_POST['type'];
    $value = $_POST['value'];
    $status = $_POST['status'];
    $date_end = $_POST['date_end'];

     
    $errors = "";
    
   if(empty($code) || empty($type)){
    $errors = "Ko thành công! \n";
    $errors .= "Vui lòng nhập đủ";
   }else{
    if(strlen($value) <=4){
        $errors = "Giá trị ko hợp lệ!";
    }else{
        $themma = addCoupon($code, $type, $value, $status, $date_end);
        if($themma){
            $errors = "Thêm thành công";
        }else{
            $errors = "Thêm thất bại!";
        }
    }
   }

    
}

?>
<h2 class="title">Thêm mã giảm giá</h2>
   
<!-- Mã HTML cho form nhập dữ liệu -->
<form action="" method="post">

<?php if (!empty($errors)) { ?>
        <p style="color:red;"><?php echo nl2br($errors); ?></p>
    <?php } ?>
    <label for="code">Mã giảm giá:</label>
    <input type="text" name="code" require><br>

    <label for="type">Loại mã giảm giá:</label>
    <select name="type" id="">
        <option value="amount">Giảm theo số tiền</option>
        <option value="percent">Giảm theo %</option>
    </select>

    <label for="value">Giá trị giảm:</label>
    <input type="text" name="value" require><br>

    <label for="status">Trạng thái:</label>
    <select name="status" id="">
        <option value="0">Chưa kích hoạt</option>
        <option value="1">Đã kích hoạt</option>
    </select>
    <label for="date_end">Ngày kết thúc:</label>
    <input type="date" name="date_end" require><br>
    <button type="submit">Thêm mã giảm giá</button>
</form>

<!-- footer -->
<?php include_once("../parts/footer.php"); ?>
<!-- end footer -->
