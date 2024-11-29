
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
        $sql = "SELECT * 
        FROM sanpham1 
        Order by rand()
        limit 4";
    //Bước 3
    $result = mysqli_query($conn, $sql);
    ?>
<style>
    .news__detail-heading-border {
        margin-top: 5px;
    }

    .news__detail-heading {
        margin-bottom: 0;
    }

    ul li a {
        font-size: 18px;
        color: #000; 
        text-decoration: none;
    }

    ul li a:hover {
        color: #ff4500;
    }

    ul li {
        margin-bottom: 10px;
    }
    .fire-icon {
        color: red; 
        font-size: 20px;
        margin-right: 10px;
    }
    .fire-text{
        color: red;
    }
</style>

<div class="col l-9">
                        <h2 class="news__detail-heading">
                           Tin Tức Gần Đây
                        </h2>
                        <ul>
    <li><span class="fire-icon">🔥</span> <a href="https://5sfashion.vn/tin-tuc/trang-web-thoi-trang?srsltid=AfmBOorsXFiYDnfF7R-k-2h9FDbA0_APHceSrM5L3b_GJZwASXUQiQuk" target="_blank" class="fire-text">Siêu sale Black Friday</a></li>
    <li><span class="fire-icon">🔥</span> <a href="https://www.thegioididong.com/game-app/top-12-trang-web-thoi-trang-hang-dau-nam-2021-1374867" target="_blank" class="fire-text">TOP 12 trang web thời trang hàng đầu năm 2024</a></li>
</ul>
<ul>
    <li><span class="fire-icon">🔥</span><a href="https://caodangyhanoi.org/8-websites-thoi-trang-danh-cho-cac-stylists/" target="_blank">8 Websites thời trang dành cho các Stylists</a></li>
    <li><span class="fire-icon">🔥</span><a href="https://ivymoda.com/tin-tuc/danh-muc/su-kien-thoi-trang?srsltid=AfmBOorEozXXzPjx-5kKBpoe4w0GaJ0u894Q36dBsQ0ig5ahDdNPnNSq" target="_blank">Sự kiện thời trang</a></li>
</ul>

    <h2 class="news__detail-heading">
                        Các sản phẩm mới của chúng tôi
                        </h2>
                        <div class="container-product__heading-border news__detail-heading-border"></div>
                        <?php while ($row= mysqli_fetch_assoc($result)) { ?>
                        <div class="news__detail-post">
                        <a href="chitiettintuc.php?masp=<?php echo $row["masp"] ?>">
                            <img src="upload/<?php echo $row["img1"] ?>" alt="" class="news__detail-img">
                            <div class="news__detail-info">
                                <a href="chitiettintuc.php?masp=<?php echo $row["masp"] ?>" class="news__detail-title"><?php echo $row["tensp"] ?></h2>
                                <span class="news__detail-per"><p>
                                    <i class="fa-solid fa-user"></i> <?php echo $row["nguoidang"] ?>
                                    <span class="news__detail-datesub">
                                        <i class="fa-solid fa-calendar-days"></i> <?php echo $row["ngaydang"] ?>
                                    </span>
                                </span>
                                <p class="news__details-msg"><?php echo $row["mota"] ?>Bạn cho giá thể đã xử lý nấm bệnh vào chậu cao cách miệng 5cm. Trồng cây sao cho cây phân bố xung quanh chậu, không trồng cây quá sát thành chậu. Nên trồng cây vào buổi chiều, sau khi tưới nước đẫm cây.</p>
                            </div>
                        </a>
                        
                        </div>

                        <?php } ?>  
        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                    

   