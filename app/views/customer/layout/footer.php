<footer>
    <style>
<<<<<<< HEAD
        .box__chat {
            width: 60px;
            height: 60px;
            background-color: #0A7CFF;
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            bottom: 10px;
            right: 10px;
            border-radius: 60px;
            z-index: 1000;
        }

        .chat__box-icon {
            position: relative;
            cursor: pointer;
        }

        .box__chat-message {
            position: absolute;
            transform: translateY(-61%);
            right: 19%;
            width: 300px;
            height: 306px;
            background-color: #fff;
            box-shadow: 0px 1px 5px 1px #9b9b9b;
            animation: hide-item .3s linear;
            display: none;
        }

        .box__chat-message.box__chat-message--active {
            display: block;
        }

        @keyframes hide-item {
            0% {
                opacity: .2;
            }

            50% {
                opacity: .6;
            }

            100% {
                opacity: 1;
            }
        }

        .box__chat-toppic,
        .box__chat-info {
            width: 100%;
            height: 60px;
            background-color: #0A7CFF;
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }

        .box__chat-info {
            display: none;
        }

        .box__chat-info.box__chat-info--active {
            display: flex;
        }

        .box__chat-toppic h4 {
            color: #fff;
            margin-left: 10px;
        }

        .info__avatar {
            width: 50px;
            height: 50px;
            background-color: #9b9b9b;
            object-fit: cover;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 10px;

        }

        .info__avatar-img {
            width: 100%;
            height: 100%;
        }

        .info__contact {
            color: #fff;
            display: flex;
            flex-direction: column;
            width: 100%;

        }

        .info__contact-name {
            font-weight: 600;
            font-size: 15px;
        }

        .info__contact-status {
            font-size: 13px;
            font-weight: 400;
            padding-right: 15px;
        }

        .box__chat-detail {
            width: 100%;
            height: 66%;
            background-color: #cecece;
            padding: 10px;
            color: #fff;
            overflow-y: auto;
            display: none;
        }

        .box__chat-toppic-detail {
            width: 100%;
            height: 66%;
            background-color: #cecece;
            padding: 5px 10px;
            color: #fff;
            flex-wrap: wrap;
            overflow-y: auto;
        }

        .box__chat-toppic-detail button {
            height: 30px;
            padding: 0 10px;
            border: none;
            outline: none;
            border-radius: 30px;
            color: #333;
            margin: 5px 0;
            cursor: pointer;
        }

        .box__chat-toppic-detail button:hover {
            color: #fff;
            opacity: .9;
            transition: all .1s linear;
            background-color: dodgerblue;
            border: 1px solid #fff;

        }

        .box__chat-toppic-detail button.box__chat-toppic-detail--active {
            border: 1px solid #fff;
            color: #fff;
            background-color: #1d3653;
        }

        .detail__mess-send {
            width: 85%;
            float: right;
            display: flex;
            justify-content: flex-end;
            margin-bottom: 5px;
        }

        .detail__mess-send span {
            background-color: #0A7CFF;
            padding: 10px;
            border-radius: 15px 10px 0 10px;
        }

        .detail__mess-send.detail__mess-reseive {
            float: left;
            display: flex;
            justify-content: flex-start;
        }

        .box__chat-send {
            width: 100%;
            height: 14%;
        }

        .detail__mess-info {
            display: flex;
        }

        span.detail__mess-text {
            border-radius: 0 10px 15px 10px;
            margin: 6px 0 0 8px;
            background-color: #333;
            padding: 6px;
        }

        .detail__mess-avt {
            min-width: 30px;
            max-height: 30px;
            object-fit: cover;
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .detail__mess-avt-img {
            width: 100%;
            height: 100%;
        }
        .info__contact-left{
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
=======
    .box__chat {
        width: 60px;
        height: 60px;
        background-color: #0A7CFF;
        display: flex;
        justify-content: center;
        align-items: center;
        position: fixed;
        bottom: 10px;
        right: 10px;
        border-radius: 60px;
    }

    .chat__box-icon {
        position: relative;
        cursor: pointer;
    }

    .box__chat-message {
        position: absolute;
        transform: translateY(-61%);
        right: 19%;
        width: 300px;
        height: 306px;
        background-color: #fff;
        box-shadow: 0px 1px 5px 1px #9b9b9b;
        display: none;
        animation: hide-item .3s linear;
    }

    .box__chat-message.box__chat-message--active {
        display: block;
    }

    @keyframes hide-item {
        0% {
            opacity: .2;
        }

        50% {
            opacity: .6;
        }

        100% {
            opacity: 1;
        }
    }

    .box__chat-info {
        width: 100%;
        height: 60px;
        background-color: #0A7CFF;
        display: flex;
        justify-content: flex-start;
        align-items: center;
    }

    .info__avatar {
        width: 50px;
        height: 50px;
        background-color: #9b9b9b;
        object-fit: cover;
        border-radius: 50%;
        overflow: hidden;
        margin: 0 10px;

    }

    .info__avatar-img {
        width: 100%;
        height: 100%;
    }

    .info__contact {
        color: #fff;

    }

    .info__contact-name {
        font-weight: 600;
        font-size: 18px;
    }

    .info__contact-status {
        font-size: 14px;
        font-weight: 400;
    }

    .box__chat-detail {
        width: 100%;
        height: 66%;
        background-color: #9b9b9b;
        padding: 10px;
        color: #fff;
        overflow-y: auto;
    }

    .detail__mess-send {
        width: 85%;
        float: right;
        display: flex;
        justify-content: flex-end;
        margin-bottom: 5px;
    }

    .detail__mess-send span {
        background-color: #0A7CFF;
        padding: 10px;
        border-radius: 15px 10px 0 10px;
    }

    .detail__mess-send.detail__mess-reseive {
        float: left;
        display: flex;
        justify-content: flex-start;
    }


    .box__chat-send {
        width: 100%;
        height: 14%;
    }

    .detail__mess-info {
        display: flex;
    }

    span.detail__mess-text {
        border-radius: 0 10px 15px 10px;
        margin: 6px 0 0 8px;
        background-color: #333;
        padding: 6px;
    }

    .detail__mess-avt {
        min-width: 30px;
        max-height: 30px;
        object-fit: cover;
        border-radius: 50%;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .detail__mess-avt-img {
        width: 100%;
        height: 100%;
    }
>>>>>>> sub_main2
    </style>
    <div class="box__chat">
        <div class="box__chat-message">
            <div class="box__chat-toppic">
                <h4>Chủ Đề</h4>
            </div>
            <div class="box__chat-info">
                <div class="info__avatar">
<<<<<<< HEAD
                    <img src="../../../../assets/images/users/th (1).jpg" alt="" class="info__avatar-img">
=======
                    <img src="../../../assets/images/users/th (1).jpg" alt="" class="info__avatar-img">
>>>>>>> sub_main2
                </div>
                <div class="info__contact">
                    <div class="info__contact-left">
                        <h2 class="info__contact-name">admin</h2>
                        <span class="info__contact-status">online now</span>
                    </div>
                    <div class="info__contact-right">
                        <span class="info__contact-status info__contact-toppic">Sản Phẩm Và Dịch Vụ</span>
                    </div>
                </div>
            </div>
            <div class="box__chat-detail">

                <div class="detail__mess-send">
                    <span>chào bạn bạn khỏe không chúc bạn 1 ngày tốt</span>
                </div>

                <div class="detail__mess-send detail__mess-reseive">
                    <div class="detail__mess-info">
                        <div class="detail__mess-avt">
                            <img src="../../../../assets/images/users/th (1).jpg" alt="" class="detail__mess-avt-img">
                        </div>
                        <span class="detail__mess-text">chào bạn chào bạn bạn khỏe không chúc bạn 1 ngày tốt</span>
                    </div>
                </div>

                <div class="detail__mess-send">
                    <span>chào bạn bạn khỏe không chúc bạn 1 ngày tốt</span>
                </div>

                <div class="detail__mess-send">
                    <span>chào bạn bạn khỏe không chúc bạn 1 ngày tốt</span>
                </div>

                <div class="detail__mess-send detail__mess-reseive">
                    <div class="detail__mess-info">
                        <div class="detail__mess-avt">
                            <img src="../../../assets/images/users/th (1).jpg" alt="" class="detail__mess-avt-img">
                        </div>
                        <span class="detail__mess-text">chào bạn chào bạn bạn khỏe không chúc bạn 1 ngày tốt</span>
                    </div>
                </div>

                <div class="detail__mess-send">
                    <span>chào bạn bạn khỏe không chúc bạn 1 ngày tốt</span>
                </div>
                <div class="detail__mess-send">
                    <span>chào bạn bạn khỏe không chúc bạn 1 ngày tốt</span>
                </div>

                <div class="detail__mess-send detail__mess-reseive">
                    <div class="detail__mess-info">
                        <div class="detail__mess-avt">
                            <img src="../../../assets/images/users/th (1).jpg" alt="" class="detail__mess-avt-img">
                        </div>
                        <span class="detail__mess-text">chào bạn chào bạn bạn khỏe không chúc bạn 1 ngày tốt</span>
                    </div>
                </div>

                <div class="detail__mess-send">
                    <span>chào bạn bạn khỏe không chúc bạn 1 ngày tốt</span>
                </div>
            </div>

            <div class="box__chat-toppic-detail">
                <?php
                $toppics = select_toppics_all();
                foreach ($toppics as $toppic) { ?>
                    <button data-id="<?= $toppic['chat_toppic_id'] ?>"><?= $toppic['chat_toppic_name'] ?></button>
                <?php
                }
                ?>
            </div>
            <style>
<<<<<<< HEAD
                .box__chat-send {
                    display: none;
                }

                .box__chat-send.box__chat-send--active {
                    display: flex;
                }

                .chat__send-input {
                    height: 44px;
                    width: 85%;
                }

                .box__chat-chat {
                    height: 44px;
                }

                .box__chat-chat button {
                    width: 100%;
                    height: 100%;
                    background-color: #0A7CFF;
                    border: none;
                    outline: none;
                    color: #fff;
                    font-size: 18px;
                    opacity: .2;
                    cursor: default;
                }

                .chat__send-input input {
                    padding-left: 10px;
                    width: 100%;
                    height: 100%;
                    border: none;
                    outline: none;
                }

                .chat__send-btn {
                    width: 15%;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                .chat__send-btn i {
                    color: #9b9b9b;
                    opacity: .2;
                }

                .chat__send-btn.chat__send-btn-active {
                    cursor: pointer;
                }

                .chat__send-btn.chat__send-btn-active i {
                    color: #0A7CFF;
                    opacity: 1;
                }
=======
            .box__chat-send {
                display: flex;
            }

            .chat__send-input {
                height: 44px;
                width: 85%;
            }

            .chat__send-input input {
                padding-left: 10px;
                width: 100%;
                height: 100%;
                border: none;
                outline: none;
            }

            .chat__send-btn {
                width: 15%;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .chat__send-btn i {
                color: #9b9b9b;
                opacity: .3;
            }

            .chat__send-btn.chat__send-btn-active {
                cursor: pointer;
            }

            .chat__send-btn.chat__send-btn-active i {
                color: #0A7CFF;
                opacity: 1;
            }
>>>>>>> sub_main2
            </style>
            <form method="post" class="box__chat-send">
                <div class="chat__send-input">
                    <input type="text" placeholder="Nhập tin nhắn ...">
                </div>

                <div class="chat__send-btn">
                    <i class="fa-sharp fa-solid fa-paper-plane"></i>
                </div>
            </form>
            <div class="box__chat-chat">
                <button data-id="<?php if (isset($_SESSION['user_id'])) {
                                        echo $_SESSION['user_id'];
                                    } ?>">Chat Ngay Bây Giờ</button>
                <?php

                ?>
            </div>
        </div>
        <div class="chat__box-icon">
            <svg width="36" height="36" viewBox="0 0 36 36">
<<<<<<< HEAD
                <path fill="white" d="M1 17.99C1 8.51488 8.42339 1.5 18 1.5C27.5766 1.5 35 8.51488 35 17.99C35 27.4651 27.5766 34.48 18 34.48C16.2799 34.48 14.6296 34.2528 13.079 33.8264C12.7776 33.7435 12.4571 33.767 12.171 33.8933L8.79679 35.3828C7.91415 35.7724 6.91779 35.1446 6.88821 34.1803L6.79564 31.156C6.78425 30.7836 6.61663 30.4352 6.33893 30.1868C3.03116 27.2287 1 22.9461 1 17.99ZM12.7854 14.8897L7.79161 22.8124C7.31238 23.5727 8.24695 24.4295 8.96291 23.8862L14.327 19.8152C14.6899 19.5398 15.1913 19.5384 15.5557 19.8116L19.5276 22.7905C20.7193 23.6845 22.4204 23.3706 23.2148 22.1103L28.2085 14.1875C28.6877 13.4272 27.7531 12.5704 27.0371 13.1137L21.673 17.1847C21.3102 17.4601 20.8088 17.4616 20.4444 17.1882L16.4726 14.2094C15.2807 13.3155 13.5797 13.6293 12.7854 14.8897Z">
=======
                <path fill="white"
                    d="M1 17.99C1 8.51488 8.42339 1.5 18 1.5C27.5766 1.5 35 8.51488 35 17.99C35 27.4651 27.5766 34.48 18 34.48C16.2799 34.48 14.6296 34.2528 13.079 33.8264C12.7776 33.7435 12.4571 33.767 12.171 33.8933L8.79679 35.3828C7.91415 35.7724 6.91779 35.1446 6.88821 34.1803L6.79564 31.156C6.78425 30.7836 6.61663 30.4352 6.33893 30.1868C3.03116 27.2287 1 22.9461 1 17.99ZM12.7854 14.8897L7.79161 22.8124C7.31238 23.5727 8.24695 24.4295 8.96291 23.8862L14.327 19.8152C14.6899 19.5398 15.1913 19.5384 15.5557 19.8116L19.5276 22.7905C20.7193 23.6845 22.4204 23.3706 23.2148 22.1103L28.2085 14.1875C28.6877 13.4272 27.7531 12.5704 27.0371 13.1137L21.673 17.1847C21.3102 17.4601 20.8088 17.4616 20.4444 17.1882L16.4726 14.2094C15.2807 13.3155 13.5797 13.6293 12.7854 14.8897Z">
>>>>>>> sub_main2
                </path>
            </svg>

        </div>
    </div>

    <div class="row">
        <div class="col l-3">
            <div class="footer_item">
                <div class="footer_item-head">
                    <h3>THÔNG TIN</h3>
                    <ul class="footer_item-list">
                        <li class="footer_item-des">
                            <a href="" class="footer_item-link">Giới Thiệu Maison</a>
                        </li>
                        <li class="footer_item-des">
                            <a href="" class="footer_item-link">Hệ Thống Cửa Hàng</a>
                        </li>
                        <li class="footer_item-des">
                            <a href="" class="footer_item-link">Tuyển Dụng</a>
                        </li>
                        <li class="footer_item-des">
                            <a href="" class="footer_item-link">Thông Tin Liên Hệ</a>
                        </li>
                        <li class="footer_item-des">
                            <img class="footer_item-logo" src="../../content/images/logos/image0.png" alt="">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col l-3">
            <div class="footer_item">
                <div class="footer_item-head">
                    <h3>TRỢ GIÚP</h3>
                    <ul class="footer_item-list">
                        <li class="footer_item-des">
                            <a href="" class="footer_item-link">Phương Thức Thanh Toán</a>
                        </li>
                        <li class="footer_item-des">
                            <a href="" class="footer_item-link">Chính Sách Giao Hàng</a>
                        </li>
                        <li class="footer_item-des">
                            <a href="" class="footer_item-link">Chính Sách Mua Hàng</a>
                        </li>
                        <li class="footer_item-des">
                            <a href="" class="footer_item-link">Chính Sách Đổi Trả</a>
                        </li>
                        <li class="footer_item-des">
                            <a href="" class="footer_item-link">Chính Sách Bảo Hành</a>
                        </li>
                        <li class="footer_item-des">
                            <a href="" class="footer_item-link">Chính Sách Bảo Mật</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="col l-3">
            <div class="footer_item">
                <div class="footer_item-head">
                    <h3>THANH TOÁN</h3>
                    <ul class="footer_item-list">
                        <li class="footer_item-des">
                            <a href="" class="footer_item-link">Visa / Mastercard / JCB</a>
                        </li>
                        <li class="footer_item-des">
                            <a href="" class="footer_item-link">HATM / Internet Banking</a>
                        </li>
                        <li class="footer_item-des">
                            <a href="" class="footer_item-link">Quét Mã QR</a>
                        </li>
                        <li class="footer_item-des">
                            <a href="" class="footer_item-link">Mua Trước Trả Sau</a>
                        </li>
                        <li class="footer_item-des">
                            <a href="" class="footer_item-link">Ví Điện Tử</a>
                        </li>
                        <li class="footer_item-des">
                            <a href="" class="footer_item-link">Thanh Toán Khi Nhận Hàng</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col l-3">
            <div class="footer_item">
                <div class="footer_item-head">
                    <h3>Giao Hàng</h3>
                    <ul class="footer_item-list">
                        <li class="footer_item-des">
                            <a href="" class="footer_item-link">Giao Hàng Tiêu Chuẩn</a>
                        </li>
                        <li class="footer_item-des">
                            <a href="" class="footer_item-link">Maison NOW</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>