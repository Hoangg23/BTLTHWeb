
<?php
session_start();
?>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "btlwebt7";

    //B1: Create connetion
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    //check connection
    
    if (!$conn) {
        die("connection failer" . mysqli_connect_error());
    }
    //B2:
    $sql_nhom = "SELECT * FROM `sanpham_nhom` ";
   ;
    //Bước 3
    $result_nhom = mysqli_query($conn, $sql_nhom);
   
    $addToCartClicked = isset($_POST['addcart']);

    if ($addToCartClicked && !isset($_SESSION['user'])) {
        // Người dùng chưa đăng nhập và đã nhấn nút "Thêm vào giỏ hàng"
        // Chuyển hướng đến trang login.php
        header("Location: login.php");
        exit();
    }

   
    ?>
    <style>
.header_section {
    width: 100%;
    float: left;
    background-image: url(./assetss/images/banner-bg.png) !important;
    height: auto;
    background-size: 100%;
    background-repeat: no-repeat;
}
.bg-light{
   width: 100%;
   height: auto;
   background-image: url(./assetss/images/header1.jpg) !important;
}
    </style>
<!DOCTYPE html>
<html>
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Cửa hàng quần áo</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="./assetss/css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="./assetss/css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="./assetss/css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="./assetss/images/fevicon.png" type="image/gif" />
      <!-- font css -->
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="./assetss/css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   </head>
   <style>
.search-container {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 0 20px;
}

.search-wrapper {
    position: relative;
    width: 450px;
    max-width: 100%;
}

.search-input {
    width: 100%;
    padding: 12px 45px 12px 20px;
    border: 2px solid #ff4d4d;
    border-radius: 30px;
    font-size: 14px;
    outline: none;
    background: white;
    transition: all 0.3s ease;
}

.search-input:focus {
    border-color: #ff3333;
    box-shadow: 0 0 10px rgba(255, 77, 77, 0.2);
}

.search-button {
    position: absolute;
    right: 5px;
    top: 50%;
    transform: translateY(-50%);
    background: #ff4d4d;
    border: none;
    width: 35px;
    height: 35px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

.search-button i {
    color: white;
    font-size: 14px;
}

.search-button:hover {
    background: #ff3333;
    transform: translateY(-50%) scale(1.05);
}

.search-input::placeholder {
    color: #999;
    font-size: 13px;
}

/* Responsive */
@media (max-width: 768px) {
    .search-wrapper {
        width: 100%;
    }
    
    .search-input {
        padding: 10px 40px 10px 15px;
        font-size: 13px;
    }
    
    .search-button {
        width: 30px;
        height: 30px;
    }
}
</style>
   <body>
      <div class="header_section">
         <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <a class="navbar-brand"href="index.php"><img src="./assetss/images/logovip.png"></a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="search-container">
    <form action="timkiemsp.php" method="GET">
        <div class="search-wrapper">
            <input type="text" name="timkiem" class="search-input" placeholder="Nhập thông tin tìm kiếm...">
            <button type="submit" class="search-button">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </form>
</div>


               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto">
                  <?php if(isset($_SESSION['user'])){ ?>
                     <li class="nav-item active">
                        <a class="nav-link" href="index.php">Trang chủ</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="fullsp.php">Sản Phẩm</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="xemdonhang_dadat.php">Đơn Hàng</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="lienhe.php">Liên hệ</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="tintuc.php">Tin tức</a>
                     </li>
                  </ul>
                  <form class="form-inline my-2 my-lg-0">
                     <div class="login_bt">
                        <ul>
                           <li><a href="#"><span class="user_icon"><i class="fa fa-user" aria-hidden="true"></i></span>	<?php echo $_SESSION['user']; ?></a></li>
                           <li><a href="logout.php"><span class="user_icon"> <i class="fa fa-sign-out-alt" aria-hidden="true"></i></span>Đăng xuất</a></li>
                           <li><a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Giỏ Hàng</a></li>
                            <?php if (isset($_SESSION['user'])) { ?>
                           <?php if (isset($_SESSION['user_permission']) && $_SESSION['user_permission'] == '1') { ?>
                              <li><a href="form.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Truy cập trang quản trị</a></li>
                           <?php } ?>
                        <?php } ?>
                        </ul>
                     </div>
                  </form>
                  <?php } else { ?>

                     <li class="nav-item active">
                        <a class="nav-link" href="index.php">Trang chủ</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="fullsp.php">Sản Phẩm</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="login.php">Đơn Hàng</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="lienhe.php">Liên hệ</a>
                     </li>
                 
                  </ul>
                  <form class="form-inline my-2 my-lg-0">
                     <div class="login_bt">
                        <ul>
                           <li><a href="login.php"><span class="user_icon"><i class="fa fa-user" aria-hidden="true"></i></span>Đăng nhập</a></li>
                           <li><a href="dangki.php"><span class="user_icon"><i class="fa fa-user-plus" aria-hidden="true"></i></span>Đăng kí</a></li>
                        </ul>
                     </div>
                  </form>
                     <?php } ?> 
               </div>
            </nav>
         </div>
   <!-- Javascript files-->
   <script src="./assetss/js/jquery.min.js"></script>
      <script src="./assetss/js/popper.min.js"></script>
      <script src="./assetss/js/bootstrap.bundle.min.js"></script>
      <script src="./assetss/js/jquery-3.0.0.min.js"></script>
      <script src="./assetss/js/plugin.js"></script>
      <!-- sidebar -->
      <script src="./assetss/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="./assetss/js/custom.js"></script>

</head>