<link href="quantri/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="quantri/css/sb-admin-2.min.css" rel="stylesheet">
<?php
include './authMiddlware.php'; 
// Kiểm tra quyền truy cập,1 là tài khoản quản lý, 0 là tài khoản người dùng
if (!checkLoginAndPermission(1)) {
    echo "<script>alert('Bạn không có quyền truy cập vào trang này.'); windown.location.back();</script>";
    exit();
}
?>
<?php include "headerquantri.php";?>
<?php
   
   include "function_cart_admin.php";
$cart = new cart();
$result = $cart->hienthi();
$count= mysqli_num_rows($result);

    ?>
<!DOCTYPE html>
<html lang="en">

<head>
 <style>
.container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 98%;
            margin: 20px auto;
        }

        .container h2 {
            text-align: center;
            color: #444;
            font-family: 'Roboto', Arial, sans-serif;
            font-weight: 700;
            font-size: 40px;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .button-group {
            display: flex;
            justify-content: right;
            margin-bottom: 20px; /* Khoảng cách giữa button và bảng */
        }

        .button-group button {
            border-radius: 5px;
            padding: 8px 16px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 14px;
            transition: 0.3s;
            font-family: 'Roboto', Arial, sans-serif;
            margin: 10px 5px;
        }

        .button-group button:hover {
            background-color: #0056b3;
            color: #fff;
        }

        .table-wrapper {
            overflow-x: auto;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            table-layout: auto;
        }

        .table th, .table td {
            text-align: center;
            border: 1px solid #ddd;
            padding: 10px;
            font-family: 'Roboto', Arial, sans-serif;
            font-size: 14px;
            vertical-align: middle;
            word-wrap: break-word;
        }

        .table th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }

        .table td {
            background-color: #ffffff;
            color: #333;
        }

        /* Thanh cuộn */
        .table-wrapper::-webkit-scrollbar {
            height: 8px;
        }

        .table-wrapper::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 4px;
        }

        .table-wrapper::-webkit-scrollbar-thumb:hover {
            background: #aaa;
        }

        /* Đáp ứng màn hình nhỏ */
        @media (max-width: 768px) {
            .container h2 {
                font-size: 20px;
            }
            .table th, .table td {
                font-size: 12px;
                padding: 8px;
            }
            .button-group button {
                font-size: 12px;
            }
        }

 </style>
</head>

<body>

    <div class="example">
        <div class="container">
            <div class="row">
                <h2>Quản Lý Đặt Hàng</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên SP</th>
                            <th>IMG</th>
                            <th>Đơn GIá</th>
                            <th>Số Lượng</th>
                            <th>Thành Tiền</th>
                            <th>ID Bill</th>
                            <!-- <th> </th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($count > 0){
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td>
                                    <?PHP echo $row["id"] ?>
                                </td>
                                <td>
                                    <?PHP echo $row["tensp"] ?>
                                </td>
                                <td>
                                <img src="upload/<?php echo $row['img']?>"alt="" width="50">
                                </td>
                                <td>
                                    <?PHP echo $row["dongia"]*1000 ?>
                                </td>
                                <td>
                                    <?PHP echo $row["soluong"] ?>
                                </td>
                                <td>
                                    <?PHP echo $row["dongia"]*$row["soluong"]*1000 ?>
                                </td>
                                <td>
                                    <?PHP echo $row["idbill"] ?>
                                </td>
                                <!-- <td>
                                   <a href="xoacart.php?id=<?PHP echo $row["id"] ?>" style="text-decoration: none">Xóa</a>
                                </td> -->
                               
                            </tr>
                           
                        <?PHP
                    }
                     } ?> 
                    </tbody>
                </table>
              
            </div>
        </div>

    </div>
</body>

</html>