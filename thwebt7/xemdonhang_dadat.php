<?php include "headernguoidung.php";?>
<?php
    include "thuvien.php";

    if (!isset($_SESSION['user'])) {
        // Kiểm tra xem người dùng đã đăng nhập chưa, nếu chưa thì chuyển hướng hoặc xử lý theo yêu cầu của bạn.
        header("Location: login.php");
        exit();
    }

    $userEmail = $_SESSION['user_email'];
    $orders = getOrdersByUser($userEmail);
    ?>
      <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/grid.css">

    <link rel="stylesheet" href="assets/scss/style.scss">
    <link rel="stylesheet" href="assets/css/responsive.css">
    

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>

.header_section {
    width: 100%;
    float: left;
    background-image: none !important;
    height: auto;
    background-size: 100%;
    background-repeat: no-repeat;
}
.product__heading {
    font-size: 3.0rem;
}
.info-product__table {
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    padding: 21px;
}
.detail-items__code {
    text-transform: uppercase;
    font-size: 1.6rem;
    font-weight: 500;
}
.info-product__table-heading {
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.info-product__heading-status {
    color: var(--primary-color);
    font-size: 1.6rem;
    font-weight: 500;
    text-transform: uppercase;
}
.info-product__table-container {
    display: flex;
    padding: 30px 0;
    border:1px solid #ebebeb;
    border-left: none;
    border-right: none;
}
.info-product__container-left {
    width: 10%;
    display: flex;
    align-items: center;
}
.info-product__container-left-img {
    width: 80px;
    height: 80px;
    border-radius: 2px;
}
.info-product__container-center {
    width: 85%;
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.info-product__container-title {
    font-size: 1.6rem;
    margin:0;
    max-height: 1.6rem;
    overflow: hidden;
    display:-webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 1;
}
.info-product__container-classify {
    margin-bottom: 0;
    font-size: 1.4rem;
    color: #86827e;
}
.info-product__container-num {
    font-size: 1.4rem;
    margin-bottom: 0;
}
.info-product__container-bottom {
    width: 15%;
    display: flex;
    justify-content: end;
    align-items: center;
}
.info-product__container-new {
    font-size: 1.6rem;
    color:#fe9614;
    padding-left: 12px;
}
.info-product__container-old {
    color: #dfdfdf;
    text-decoration: line-through;
    font-size: 1.6rem;
}
.info-product__table-footer {
    display: flex;
    flex-direction: column;
}
.info-product__footer-top {
    margin-left: auto;
    font-size: 1.6rem;
    padding: 20px 0;
}
.info-product__footer-top-money {
    color: #fe9614;
    font-size: 1.8rem;
    font-weight: 500;
}
.info-product__footer-bottom {
    display: flex;
    justify-content: space-between;
}
.info-product__footer-title {
    font-size: 1.4rem;
}
.info-product__footer-right {
    display: flex;
    align-items: center;
}
.info-product__footer-cancel {
    text-decoration: none;
    color:#fff;
    font-size: 1.4rem;
    background-color: #1c5b41;
    min-width: 212px;
    text-align: center;
    padding: 16px;
    border-radius: 10px;
    margin: 0 10px;
    cursor: pointer;
    transition: background-color linear .2s;
    border: none;
}

.info-product__footer-cancel:hover {
    background-color: #fe9614;
}
</style>
</head>

<body>

<div class="wrapper">
    <div class="info-product">
        <div class="grid wide">
        
        <div class="col l-12">
    <h3 class='product__heading'>Đơn hàng của bạn </h3>

    <?php foreach ($orders as $order): ?>
        <div class='info-product__table'>
            <div class='info-product__table-heading'>
                <p class='detail-items__code'> Các Sản Phẩm </p>
                <div class='info-product__heading-right'>
                    <p class='info-product__heading-status'>
                        Trạng thái
                        <span class="order-status <?= $order['trangthai'] === 'Đã Duyệt' ? 'status-approved' : 'status-pending' ?>">
                            (<?= $order['trangthai'] ?>)
                        </span>
                    </p>
                </div>
            </div>
            <div class='info-product__table-after'>
                <?php
                $orderDetails = getOrderDetails($order['id']);
                foreach ($orderDetails as $detail):
                ?>
                    <div class='info-product__table-container'>
                        <div class='info-product__container-left'>
                            <img src='./upload/<?= $detail['img'] ?>' alt='' class='info-product__container-left-img'>
                        </div>
                        <div class='info-product__container-center'>
                            <h4 class='info-product__container-title'><?= $detail['tensp'] ?></h4>
                            <p class='info-product__container-num'>Số lượng: <?= $detail['soluong'] ?></p>
                        </div>
                        <div class='info-product__container-bottom'>
                            <span class='info-product__container-new'><?= $detail['dongia'] ?> 000 VNĐ</span>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class='info-product__table-footer'>
                    <p class='info-product__footer-top'>Thành Tiền : <span class='info-product__footer-top-money'><?= $order['total'] ?> 000 VNĐ</span></p>
                    <div class='info-product__footer-bottom'>
                    <div class='info-product__footer-left'>
                <p class='info-product__footer-title'>
                <?php
                switch ($order['trangthai']) {
                case 'Đã Duyệt':
                echo "Đơn hàng đã được xác nhận và đang được vận chuyển";
                break;
                case 'Đã Giao':
                echo "Đơn hàng đã được giao thành công";
                break;
                default:
                echo "Đơn hàng sẽ được chuẩn bị và chuyển đi sau khi duyệt";
                break;
                }
                ?>
                </p>
                </div>
                        <div class='info-product__footer-right'>
    <a href='contact.php' class='info-product__footer-cancel'>Liên hệ người bán</a>
    <?php 
    if ($order['trangthai'] == 'Chưa Duyệt'): ?>
        <form method="post" action="huy_don_hang.php" style="display: inline;">
            <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
            <button type="submit" class="info-product__footer-cancel" name="huy_don_hang">Hủy đơn hàng</button>
        </form>
    <?php 
    elseif ($order['trangthai'] == 'Đang Giao'): ?>
        <span class="order-status-badge shipping">
            <i class="fas fa-shipping-fast"></i> Đơn hàng đang được vận chuyển
        </span>
    <?php elseif ($order['trangthai'] == 'Đã Giao'): ?>
        <span class="order-status-badge delivered">
            <i class="fas fa-check-circle"></i> Đơn hàng đã giao thành công
        </span>
    <?php elseif ($order['trangthai'] == 'Đã Duyệt'): ?>
        <span class="order-status-badge approved">
            <i class="fas fa-clipboard-check"></i> Đơn hàng đã được xác nhận
        </span>
    <?php endif; ?>
</div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
        </div>
    </div>
</div>
<script>
    // Kiểm tra biến session và hiển thị thông báo nếu có
    <?php if (isset($_SESSION['order_cancel_success']) && $_SESSION['order_cancel_success']): ?>
        alert("Đơn hàng đã được hủy thành công!");
        <?php
        // Đặt lại biến session để không hiển thị thông báo khi người dùng làm mới trang
        unset($_SESSION['order_cancel_success']);
        ?>
    <?php endif; ?>
</script>

</body>
</html>