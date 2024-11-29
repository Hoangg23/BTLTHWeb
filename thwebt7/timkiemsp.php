<?php include "headernguoidung.php";?>

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
    
    if(isset($_GET['timkiem']) ){
        $key=$_GET['timkiem'];
        $sql = "SELECT * FROM `sanpham1` where tensp like  '%$key%' ";
        

    }
    else
    { $sql = "SELECT * FROM `sanpham1`  ";
    }
    $result = mysqli_query($conn, $sql);
    ?>	




<style>
.current-ten{
    text-transform: uppercase;
    color: green;
    font-weight: bold;

}
.main-wrapper {
    padding: 30px 0;
    background: #f8f9fa;
}

.home-title-block {
    text-align: center;
    margin-bottom: 30px;
}

.home-title {
    font-size: 28px;
    color: #333;
    position: relative;
    display: inline-block;
    padding-bottom: 10px;
}

.home-title:after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 3px;
    background: #ff4d4d;
}

/* Products Grid */
.home-products {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 25px;
    padding: 20px 0;
}

/* Product Card */
.col-product {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 3px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.col-product:hover {
    transform: translateY(-5px);
}

.card-header {
    position: relative;
    padding-top: 100%;
    overflow: hidden;
}

.card-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.col-product:hover .card-image {
    transform: scale(1.05);
}

/* Product Info */
.food-info {
    padding: 15px;
}

.current-ten {
    display: block;
    font-size: 16px;
    color: #333;
    font-weight: 600;
    margin-bottom: 10px;
    text-transform: uppercase;
}

.current-price {
    color: #ff4d4d;
    font-size: 18px;
    font-weight: bold;
}

/* Add to Cart Button */
.card-button {
    width: 100%;
    padding: 12px;
    background: #ff4d4d;
    color: white;
    border: none;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-top: 15px;
}

.card-button:hover {
    background: #ff3333;
    transform: translateY(-2px);
}

/* No Results Message */
.no-results {
    text-align: center;
    padding: 40px 20px;
    color: #666;
}

/* Responsive Design */
@media (max-width: 768px) {
    .home-products {
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 15px;
    }

    .home-title {
        font-size: 24px;
    }

    .current-ten {
        font-size: 14px;
    }

    .current-price {
        font-size: 16px;
    }

    .card-button {
        padding: 10px;
        font-size: 13px;
    }
}

/* Animation */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.col-product {
    animation: fadeIn 0.5s ease forwards;
}

/* Product Price Layout */
.product-price {
    margin: 8px 0;
}

/* Card Footer */
.card-footer {
    padding: 10px 15px;
    border-top: 1px solid #eee;
}

/* Product Buy Section */
.product-buy {
    display: flex;
    justify-content: center;
}

/* Order Button */
.order-itemt {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    background: #ff4d4d;
    color: white;
    padding: 10px 20px;
    border-radius: 25px;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
}

.order-itemt:hover {
    background: #ff3333;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(255, 77, 77, 0.2);
}
    </style>

</head>
<main class="main-wrapper">
    <div class="container" id="trangchu">
 <div class="home-title-block" id="home-title">
                <h2 class="home-title">Sản Phẩm Bạn Tìm Kiếm</h2>
            </div>
            <div class="home-products" id="home-products"> 
                 <?php       $limit = 8; 
                            $count = 0; 
                            while ($row= mysqli_fetch_assoc($result)) { 
                                if ($count >= $limit) {
                                    break; 
                                }    
                        ?>  
                <div class="col-product">
               
                    <article class="card-product" >
                        <div class="card-header">
                            <a href="chitiet.php?masp=<?php echo $row["masp"] ?>" class="card-image-link" >
                                        <img  src="upload/<?php echo $row["img1"] ?>" alt="" class="card-image"  >
                                    </a> 
                         
                        </div>
                        <form action="cart.php" method="post" class="product__items-cart">
                      
                        <div class="card-footer">
                                            <div class="product-buy">
                                                <!-- <i class="fa-regular fa-cart-shopping-fast"></i> -->
                                            <input type="submit" value="Đặt hàng" name="addcart" class="card-button order-itemt">
                                        </div>
                                    </div>
                           
                                            <input type="hidden" name="soluong" value="1">
                                            <input type="hidden" name="tensp" value="<?php echo $row["tensp"] ?>">
                                            <input type="hidden" name="dongiamoi" value="<?php echo $row["dongiamoi"] ?> 000 VNĐ">
                                            <input type="hidden" name="img1" value="<?php echo $row["img1"] ?>">   
                                    </form>
                        <div class="food-info">
                            <div class="card-content">
                                <div class="card-title">
                                    <a href="#" class="card-title-link" ></a>
                                </div>
                            </div>
                            <div class="card-footer">
                            <div class="product-price">
                                    <span class="current-ten"><?php echo $row["tensp"] ?></span>
                                </div>
                                <div class="product-price">
                                    <span class="current-price"><?php echo $row["dongiamoi"] ?> 000 VNĐ</span>
                                </div>
                            <!-- <div class="product-buy">
                            
                                <button  class="card-button order-item"><i class="fa-regular fa-cart-shopping-fast"></i> Đặt hàng</button>
                            </div>  -->
                        </div>
                        
                        </div>
                   
            </div>
          <?php 
                            $count++;    
                            }     ?>  
           <div class="page-nav">
            <ul class="page-nav-list">
               </ul>
           </div>
        </div> 
      </div>
    </div>
                        </div>
               
<?php include"footernguoidung.php";?>