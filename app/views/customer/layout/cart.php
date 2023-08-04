<?php
include '../../../../global.php';
include '../../../models/DAO/connect.php';
include '../../../models/DAO/products.php';
$cus_id = $_SESSION['user_id']; 
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="<?= $ASSET_URL ?>/css/grid.css">

    <link rel="stylesheet" href="../../css/toast.css">
    <link rel="stylesheet" href="<?= $ASSET_URL ?>/css/app.css">
    <link rel="stylesheet" href="<?= $ASSET_URL ?>/css/page-user.css">
    <link rel="shortcut icon" href="<?= $ASSET_URL ?>/images/logos/Main Logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<a href="../../../models/DAO/delete_cart.php"></a>

<body>

    <div id="wrapper">
        <header>
            <div class="banner_top">
                <div class="banner_top__center">
                    <h3>Quà tặng hấp dẫn</h3>
                </div>
                <div class="banner_top__right">
                    <div class="banner_top__right-season">
                        <span>Welcome</span>
                        <h1>Summer</h1>
                    </div>
                    <div class="banner_top__right-year">
                        <h4>2023</h4>
                    </div>
                </div>
            </div>
    </div>

    <?php
        require_once '../layout/nav.php';
    ?>


    </header>
    <style>
    .header_logo {
        margin-top: 40px;
    }

    .header_logo-box {
        width: 300px;
        height: 70px;
        object-fit: cover;
        display: flex;
        justify-content: flex-start;

    }

    .header_logo-item {
        width: 100%;
        height: 100%;
        margin-right: 10px;
    }

    .header_title-box {
        width: 300px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 100px;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    tr.cart-item:hover {
        background-color: rgb(246, 246, 246);
        transform: translateY(-5px);
        transition: all .3s;
    }

    .content_box {
        margin-top: 40px;
    }

    .product {
        display: flex;
        justify-content: flex-start;
        align-items: center;
    }

    .product-box {
        width: 100px;
        height: 130px;
        object-fit: cover;
    }

    .product-cate {
        display: flex;
        margin-left: 30px;
    }

    .product-cate h4 {
        font-weight: 500;

    }

    .product_img {
        width: 100%;
        height: auto;
    }

    .product-name {
        overflow: hidden;
    }

    .product-name span {
        margin-left: 10px;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        max-width: 230px;
        line-height: 1.4rem;
    }

    .product_delete-link {
        text-decoration: none;
    }

    .product_delete-link:hover {
        text-decoration: underline;
        transition: .3s all linear;
        color: rgb(127, 35, 35);
    }

    .quantity {
        display: flex;
        align-items: center;
    }

    .quantity-btn {
        padding: 5px 10px;
        font-size: 16px;
        cursor: pointer;
        border: 1px solid #ccc;
        background-color: #f9f9f9;
    }

    .quantity-input {
        width: 40px;
        text-align: center;
        border: 1px solid #ccc;
        padding: 5px;
        margin: 0 5px;
    }

    .product_pay {
        position: fixed;
        bottom: 0;
        right: 0;
        width: 100%;
        height: 50px;
        background-color: beige;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 168px;
    }

    .product_check-all input {
        width: 15px;
        height: 15px;
    }

    .product_check-all button {
        margin: 0 8px;
        width: 100px;
        height: 30px;
    }

    .product_pay-all-price {
        font-size: 18px;
        color: #fb5533;
    }

    .product_pay-all button {
        width: 100px;
        height: 30px;
        background-color: #fb5533;
        color: #fff;
        border: none;
        outline: none;
        margin-left: 10px;
        cursor: pointer;
        transition: all .1s linear;
    }

    .product_pay-all button:hover {
        opacity: .8;
    }

    .cart-item__checkbox {
        width: 20px;
        height: 20px;
        cursor: pointer;
        transition: all .3s linear;
    }

    .cart-item__checkbox:checked {
        background-color: #fb5533;
    }

    .product_delete-link {
        color: #333;
        font-size: 18px;
        font-weight: 700;
        color: #fb5533;
    }

    .cart-item__price--old {
        color: #fb5533;
        text-decoration: line-through;
        opacity: .7;
    }
    </style>
    <div class="header_logo">
        <div class="grid wide">
            <div class="header_logo-box">
                <img src="<?= $ASSET_URL ?>/images/logos/FhashionHub2-removebg-preview.png" alt=""
                    class="header_logo-item">
                <div class="header_title-box">
                    <h2 class="header_logo-title">Giỏ Hàng</h2>
                </div>
            </div>

            <div class="content_box">
                <form action="" method="post">
                    <table>
                        <tr>
                            <th></th>
                            <th>Sản Phẩm</th>
                            <th></th>
                            <th>Đơn Giá</th>
                            <th>Size</th>
                            <th>Số Lượng</th>
                            <th>Thành Tiền</th>
                            <th>Thao Tác</th>
                        </tr>
                        <!-- start row -->
                        <?php
                            if (isset($_SESSION['data-cart'])) {
                                $data = $_SESSION['data-cart'];
                                foreach ($data as $key => $item) {
                                    if ($key === 'totalQuantity') {
                                        continue;
                                    } ?>

                        <tr class="cart-item">
                            <?php
                                        $id = $item['id'];
                                        $product_id = $id;
                                        ?>
                            <td>
                                <input data-id="<?= $item['id_price'] ?>" class="cart-item__checkbox" type="checkbox">
                            </td>
                            <td>
                                <div class="product">
                                    <div class="product-box">
                                        <img src="https://product.hstatic.net/1000284478/product/<?= $item['imgName'] ?>"
                                            alt="" class="product_img">
                                    </div>
                                    <div class="product-name">
                                        <span><?= $item['name'] ?></span>
                                    </div>
                                    <div class="product-cate">
                                        <h4>Danh Mục:</h4>
                                        <?php
                                                    $cate = select_category_by_id($id);
                                                    ?>
                                        <span><?= $cate[0]['cate_name'] ?></span>
                                    </div>
                                </div>
                            </td>
                            <td class="cart-item__price--old">
                                <?php
                                            $priceSale = select_price_sale_by_id($id);
                                            if (!empty($priceSale)) {
                                                if (!empty($priceSale[0]['sale_price'])) {
                                                    $price = number_format($priceSale[0]['sale_price'], 0, ',', ',');
                                                    echo $price . ' ' . 'đ';
                                                } else {
                                                    echo '';
                                                }
                                            }
                                            ?>

                            </td>
                            <td class="cart-item__price"><?= $item['price'] ?></td>
                            <td>
                                <?php
                                            $sizeId = select_size_hang_hoa_by_id($id);
                                            $sizeAll = select_size_by_id($sizeId);
                                            if (!empty($sizeAll)) { ?>
                                <select class="cart-item__size">
                                    <?php
                                                    foreach ($sizeAll as $size) { ?>
                                    <option value=""><?= $size['name_size'] ?></option>
                                    <?php
                                                    } ?>
                                </select>
                                <?php
                                            } else {
                                                echo '<span>No size</span>';
                                            }
                                            ?>


                            </td>

                            <td>
                                <div class="cart-item">
                                    <div class="quantity">
                                        <button class="quantity-btn decrease">-</button>
                                        <input type="number" id="total_quantity" class="quantity-input"
                                            value="<?= $item['quantity'] ?>" min="1">
                                        <button class="quantity-btn increase">+</button>
                                    </div>
                                </div>
                            </td>
                            <td class="cart-item__total">
                                <?php
                                            $amount_vnd = $item['price'];
                                            $amount_vnd = str_replace(",", "", $amount_vnd);
                                            $amount_vnd = str_replace("₫", "", $amount_vnd);
                                            $amount_integer = (int)$amount_vnd;
                                            $total = (int)$item['quantity'] * $amount_integer;
                                            $amount_vnd = number_format($total, 0, ',', ',') . " ₫";
                                            echo $amount_vnd;
                                            ?>

                            </td>
                            <td>
                                <div class="product_delete">
                                    <a href="<?= $DAO_URL ?>/delete_cart_page.php?id_product=<?= $item['id_price'] ?>"
                                        class="product_delete-link">Xóa</a>
                                </div>
                            </td>
                        </tr>
                        <?php
                                }
                            } else {
                                echo 'Bạn chưa có sản phẩm nào trong giỏ hàng';
                            }
                            ?>

                        <div class="product_pay">
                            <div class="product_check-all">
                                <button>Chọn Tất Cả</button>
                            </div>
                            <div style="display: flex;" class="product_pay-all">
                                <p>Tổng Thanh Toán(0 sản phẩm):</p>
                                <span class="product_pay-all-price">0đ</span>
                                <?php
                                    if (isset($_SESSION['user_fullname'])) :
                                    ?>
                                <!--  -->
                                <a style="pointer-events: none;" id="idPay"><button id="paymentButton"
                                        style="padding: 0 5px;opacity: .1;cursor: default;">Mua
                                        Hàng</button></a>
                                <?php else : ?>
                                <a style="margin-left: 20px; text-decoration:none; font-weight:bold; color:#f9f9f9; background-color:#fb5533;height: 25px; display: flex;align-items:center; justify-content: center; ;width:90px;"
                                    class="btn_login" href="<?php echo $SITE_URL; ?>/tai-khoan/login.php">Đăng
                                    nhập</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </table>
                </form>

            </div>


        </div>
    </div>



</body>
<script>
const cartItems = document.querySelectorAll('.cart-item');
const checkAllButton = document.querySelector('.product_check-all button');
const checkboxItems = document.querySelectorAll('.cart-item__checkbox');
const countCheckedSpan = document.querySelector('.product_pay-all p');
const totalMoney = document.querySelector('.product_pay-all-price');
let checkedCount = 0;
let total = 0;
noClick();

checkAllButton.addEventListener('click', function() {
    if (checkAllButton.innerText === 'Chọn Tất Cả') {
        checkedCount = checkboxItems.length;
    } else {
        checkedCount = 0;
    }

    updateCheckedCount();
    const checkAll = checkAllButton.innerText === 'Chọn Tất Cả';

    for (let i = 0; i < checkboxItems.length; i++) {
        checkboxItems[i].checked = checkAll;
        const cartItem = checkboxItems[i].parentElement.parentElement;
        const monneysItem = cartItem.querySelector('.cart-item__total');
        let totalItem = priceToInt(monneysItem.innerText)
        total += totalItem;
    }

    checkAllButton.innerText = checkAll ? 'Bỏ Chọn Tất Cả' : 'Chọn Tất Cả';

    if (checkAllButton.innerText !== 'Bỏ Chọn Tất Cả') {
        total = 0;
    }
    updataTotalMoney();

});

for (let i = 0; i < checkboxItems.length; i++) {
    checkboxItems[i].addEventListener('click', function() {
        const cartItem = checkboxItems[i].parentElement.parentElement;
        const monneysItem = cartItem.querySelector('.cart-item__total');
        if (checkboxItems[i].checked === true) {
            total += priceToInt(monneysItem.innerText);
        } else {
            total -= priceToInt(monneysItem.innerText);
        }
        updataTotalMoney();

        checkedCount = this.checked ? checkedCount + 1 : checkedCount - 1;
        updateCheckedCount();

        let allChecked = true;
        for (let j = 0; j < checkboxItems.length; j++) {
            if (!checkboxItems[j].checked) {
                allChecked = false;
                break;
            }
        }
        checkAllButton.innerText = allChecked ? 'Bỏ Chọn Tất Cả' : 'Chọn Tất Cả';
    });
}

function updateCheckedCount() {
    countCheckedSpan.innerText = `Tổng Thanh Toán(${checkedCount} sản phẩm):`;
}

function updataTotalMoney() {
    totalMoney.innerHTML = `${intToPrice(total)}`

}

function priceToInt(price) {
    var amount_vnd = price;
    amount_vnd = amount_vnd.replace(/,/g, '');
    amount_vnd = amount_vnd.replace('₫', '');
    return parseInt(amount_vnd);
}

function intToPrice(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " đ";
}

function totalPriceItem(item, quantity) {
    const cartParent = item.parentElement.parentElement;
    const inputCheckBox = cartParent.querySelector('.cart-item__checkbox');
    const priceItem = cartParent.querySelector('.cart-item__price');
    const totalPrice = quantity * priceToInt(priceItem.innerText);
    const totalItem = cartParent.querySelector('.cart-item__total');
    totalItem.innerHTML = intToPrice(totalPrice)
    if (inputCheckBox.checked) {
        const allCheckInput = document.querySelectorAll('.cart-item__checkbox:checked');
        if (allCheckInput.length > 1) {
            total = 0;
            allCheckInput.forEach(function(input) {

                total += priceToInt(input.parentElement.parentElement.querySelector('.cart-item__total')
                    .innerText);
            })
        } else {
            total = priceToInt(totalItem.innerText);
        }

        updataTotalMoney();
    }

}
document.addEventListener('click', (event) => {
    if (event.target.matches('.decrease')) {
        const item = event.target.closest('.cart-item');
        const quantityInput = item.querySelector('.quantity-input');
        let quantity = parseInt(quantityInput.value);
        if (quantity > 1) {
            quantity--;
            quantityInput.value = quantity;
            totalPriceItem(item, quantity);
        }
    } else if (event.target.matches('.increase')) {
        const item = event.target.closest('.cart-item');
        const quantityInput = item.querySelector('.quantity-input');
        let quantity = parseInt(quantityInput.value);
        quantity++;
        quantityInput.value = quantity;
        totalPriceItem(item, quantity);
    }
});


$(document).ready(function() {
    const btnPay = document.getElementById('idPay');
    btnPay.addEventListener('click', function(e) {
        e.preventDefault();
        window.location.href = '../oders/index.php';
        const listCheck = document.querySelectorAll('.cart-item td .cart-item__checkbox');
        var obj = {};
        listCheck.forEach(function(check) {
            if (check.checked) {
                var productId = check.dataset.id;
                var quantity = check.parentElement.parentElement.querySelector(
                    'td .cart-item .quantity input.quantity-input').value;
                obj[productId] = {
                    quantity: quantity,
                    order: "order"
                };

            }
        });
        const totalPrice = document.querySelector('.product_pay-all-price');
        obj["totalPrice"] = totalPrice.innerText;
        $.ajax({
            url: '../../../models/DAO/add_order.php', // Đường dẫn đến tập tin PHP xử lý dữ liệu
            type: 'POST', // Phương thức gửi dữ liệu (POST hoặc GET)
            data: JSON.stringify(obj), //một đối tượng JSON
            contentType: 'application/json', //định dạng kiểu json
            dataType: 'json',
            success: function(response) {
                // Xử lý phản hồi từ máy chủ (nếu cần)
            },
            error: function(xhr, status, error) {
                // Xử lý lỗi (nếu có)
            }
        });
    })


})

function noClick() {
    const mySpan = document.querySelector('.product_pay-all-price');

    const observer = new MutationObserver(function(mutationsList) {
        mutationsList.forEach(function(mutation) {
            if (mutation.type === 'childList') {
                const abtnPayy = document.getElementById('idPay');
                const buttonPay = document.getElementById('paymentButton');
                if (mySpan.textContent === '0 đ') {
                    abtnPayy.style.pointerEvents = 'none';
                    buttonPay.style.opacity = 0.1;
                } else {
                    abtnPayy.style.pointerEvents = 'auto';
                    buttonPay.style.opacity = 1;
                }
            }
        });
    });
    const config = {
        childList: true,
        subtree: true
    };
    observer.observe(mySpan, config);
}
</script>

</html>