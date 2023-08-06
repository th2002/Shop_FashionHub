<?php require_once '../page_user/header.php' ?>
<?php require_once '../../../models/DAO/oders.php'; ?>
<?php
    if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])){
        header('Location:' . $SITE_URL . '/tai-khoan/login.php');
        exit();
    }
?>
<?php
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <header>
        <div class="sidebar">
            <div class="logo-details">
                <a href="./index.php">
                    <i class="bx bxl-c-plus-plus"></i>
                    <span class="logo_name">
                        <a style="font-size: 18px; color:#333; font-weight: bold;"
                            href="<?= $SITE_URL ?>/page_user/form-edit-profile.php">Xin
                            chào,
                            <?php echo $_SESSION['user_fullname'] ?>
                        </a>
                    </span>
                </a>
            </div>
            <ul class="nav-links">
                <li>
                    <a href="./form-edit-profile.php" class="">

                        <span class="links_name"><i class="fa-solid fa-circle-info"></i>Sửa Thông Tin</span>
                    </a>
                </li>
                <li>
                    <a href="./form-change-password.php" class="">

                        <span class="links_name"><i class="fa-solid fa-unlock"></i>Đổi Mật Khẩu</span>
                    </a>
                </li>
                <li>
                    <a href="./purchase-history.php" class="">

                        <span class="links_name"><i class="fa-solid fa-receipt"></i>Lịch Sử Mua Hàng</span>
                    </a>
                </li>
            </ul>
        </div>
        <section class="home-section">
            <nav class="header">
                <div class="sidebar-button">
                    <i class="bx bx-menu sidebarBtn"></i>
                    <span style="margin-left: 84px; letter-spacing: 5px; text-transform:uppercase"
                        class="dashboard">Lịch sử mua hàng</span>
                </div>
            </nav>
            <!-- Have oders -->
            <?php
            $result = select_oder_all_by_user($user_id);
            ?>
            <?php if (empty($result)) : ?>
            <div class="no-oder">
                <i style="margin: 5% 0  0 45%; font-size: 80px; color: #868D95" class="fa-solid fa-truck-fast"></i>
                <div class="title-notifi">
                    <p
                        style="display: flex; justify-content: center; margin-top: 30px; font-weight:bold; font-size: 18px; color: #868D95;">
                        Không có đơn hàng nào!
                    </p>
                </div>
                <div style="display: flex; justify-content:center" class="content-notifi">
                    <p style="text-align: center; width: 280px; color:#868D95">
                        Hãy mua sắm ngay lúc này để tận hưởng những ưu đãi hấp dẫn
                        chỉ dành cho riêng bạn
                    </p>
                </div>
                <div style="display: flex; justify-content:center;">
                    <a style="width: 280px; height: 53px; margin-top: 30px;border-radius:2px; background-color: #2E2E2E; color: #fff; outline: none;
        text-transform: uppercase; padding-top: 15px; padding-bottom: 15px; font-size:14px;
        text-decoration: none;" href="<?= $SITE_URL ?>/home">
                        <span style="letter-spacing: 2px; margin-left: 35px; ">
                            Dạo một vòng xem nào
                        </span>
                    </a>
                </div>
            </div>
            <?php endif; ?>

            <?php foreach ($result as $oder) : ?>
            <div style="box-shadow: 0px 0px 2px 0.5px #868D95; margin-left: 9%" class="have-oder col-md-10 mb-3">
                <div style="margin-left: 0px;--bs-border-opacity: .5;"
                    class="row col-md-12 border-bottom border-1 border-secondary">
                    <!-- Title -->
                    <div class="col-md-6">
                        <h6 style="margin-left: 4%; padding-top: 7px; ">Mã hóa đơn: <?php echo $oder['id'] ?></h6>
                    </div>
                    <div class="col-md-3">

                        <?php
                            if ($oder['status_delivery'] == 0) {
                                echo '<h6 style="color: cornflowerblue; padding-top: 7px; margin-left: -1%;">Chưa giao</h6>';
                            } elseif ($oder['status_delivery'] == 1) {
                                echo '<h6 style="color: orangered; padding-top: 7px; margin-left: -1%;">Đang giao</h6>';
                            } elseif ($oder['status_delivery'] == 2) {
                                echo '<h6 style="color: green; padding-top: 7px; margin-left: -1%;">Đã giao</h6>';
                            } else {
                                echo '<h6 style="color: red; padding-top: 7px; margin-left: -1%;">Đã hủy</h6>';
                            }
                            ?>
                    </div>
                    <div class="col-md-3">
                        <h6 class="ms-4" style="color: grey; padding-top: 7px;">Ngày tạo đơn: 5/8/2023</h6>
                    </div>
                </div>
                <div class="row mt-3">
                    <div style="margin-left: 3%;" class="col-md-2 fs-6">
                        <p>Tên người nhận</p>
                    </div>
                    <div class="col-md-3 fs-6">
                        <p>: <?php echo $oder['recipient_name'] ?></p>
                    </div>
                    <div class="col-md-2 fs-6 ms-5">
                        <p>Số điện thoại</p>
                    </div>
                    <div class="col-md-3 fs-6">
                        <p>: <?php echo $oder['phone_number'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div style="margin-left: 3%;" class="col-md-2 fs-6">
                        <p>Trạng thái </p>
                    </div>
                    <div class="col-md-3 fs-6">
                        <?php
                            if ($oder['status_payment'] == 1) {
                                echo '<p style="color: green;">: Đã thanh toán</p>';
                            } else {
                                echo '<p style="color: red;">: Chưa thanh toán</p>';
                            }
                            ?>
                    </div>
                    <div style="margin-left: 5%;" class="col-md-2 fs-6 ms-6 ">
                        <p>Địa chỉ </p>
                    </div>
                    <div class="col-md-4 fs-6">
                        <p>: <?php echo $oder['address_detail'] . ', ' . $oder['ward'] . ', ' . $oder['district'] . ', ' . $oder['province'] ?>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div style="margin-left: 3%;" class="col-md-2 fs-6">
                        <p>Thanh toán </p>
                    </div>
                    <div class="col-md-3 fs-6">
                        <?php
                            if ($oder['payment_method'] == 0) {
                                echo '<p>: Tiền mặt</p>';
                            } else {
                                echo '<p>: Chuyển khoản</p>';
                            }

                            ?>
                    </div>
                    <div style="margin-left: 5%;" class="col-md-2 fs-6 ms-6 ">
                        <p>Mã giảm giá</p>
                    </div>
                    <?php
                        $coupon = select_all_coupon($oder['coupon_code_id']);
                        
                    ?>
                    <div class="col-md-4">
                        <p>
                            : <?php
                                    if (!empty($coupon)) {
                                        if ($coupon['type'] == 0) {
                                        echo $coupon['code'] . ' ( ' . 'giảm ' .  number_format($coupon['value']) . 'đ' . ' )';
                                    } else {
                                        echo $coupon['code'] . ' ( ' . 'giảm ' . $coupon['value'] . '%' . ' )';
                                    }
                                    } else {
                                        echo 'Không có mã giảm giá';
                                    }
                                    

                                    ?>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div style="margin-left: 3%;" class="col-md-2 fs-6">
                        <p>Tổng hóa đơn </p>
                    </div>
                    <div class="col-md-3 fs-6">
                        <p>: <?php echo number_format($oder['total_amount'])  . 'đ' ?></p>
                    </div>
                    <div style="margin-left: 5%;" class="col-md-2 fs-6 ms-6 ">
                        <p>Tiền phải trả</p>
                    </div>
                    <div class="col-md-4">
                        <p>
                            : <?php
                            if (!empty($coupon)) {
                                if ($coupon['type'] == 0) {
                                echo  number_format($oder['total_amount'] - $coupon['value']) . 'đ';
                            } else {
                                echo  number_format($oder['total_amount'] - (($oder['total_amount'] * $coupon['value'])/100) ) . 'đ';
                            }
                            } else {
                                echo number_format($oder['total_amount'])  . 'đ';
                            }
                            
                            
                        ?>
                        </p>
                    </div>
                </div>
                <div class="row ms-3">
                    <div class="col-md-3 mb-3">
                        <a style="text-decoration: none;" class="" data-bs-toggle="collapse"
                            href="#collapseExample<?= $oder['id'] ?>" role="button" aria-expanded="false"
                            aria-controls="collapseExample<?= $oder['id'] ?>">
                            Xem thêm
                        </a>
                    </div>
                    <!-- product in oder_detail -->
                    <?php
                        $oder_details = select_order_details_with_product_info($oder['id']);
                        ?>
                    <?php
                        foreach ($oder_details as $oder_detail) :
                        ?>
                    <div class="collapse mb-3" id="collapseExample<?= $oder['id'] ?>">
                        <div class="row">
                            <div class="col-md-2">
                                <img style="width: 80px; height: 80px" src="<?= $oder_detail['image_url'] ?>" alt=""
                                    class="img-thumbnail">
                            </div>
                            <div class="col-md-3">
                                <p>
                                    <?php
                                            echo $oder_detail['product_name'];
                                            ?>
                                </p>
                            </div>
                            <div class="col-md-2">
                                <p>Số lượng: <?php echo $oder_detail['quantity'] ?></p>
                            </div>
                            <div class="col-md-2">
                                <?php
                                    if ($oder_detail['size'] != "") {
                                        echo '<p>Size: '. $oder_detail['size']. '</p>'; 
                                    } else {
                                        echo '<p class="fs-6">No size</p>';
                                    }
                                    
                                ?>
                            </div>
                            <div class="col-md-3">
                                <p>Giá:
                                    <?php echo number_format($oder_detail['price'] * $oder_detail['quantity']) . 'đ' ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php
                        endforeach;
                        ?>
                </div>
            </div>
            <?php endforeach ?>
            <!-- No oders -->

        </section>
    </header>
</body>

</html>