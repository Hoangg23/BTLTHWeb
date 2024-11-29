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
<?php include "headerquantri.php"; ?>
<?php
include "thuvien.php";
include "function_bill_admin.php";
$bill = new bill();
$result = $bill->hienthi();
$count = mysqli_num_rows($result);


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
                <h2>Quản Lý Thông Tin Đơn Đặt Hàng</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Tel</th>
                            <th>Email</th>
                            <th>Thanh Toán</th>
                            <th>Trạng thái</th>
                            <th>Ngày giao</th>
                            <th>Chức năng</th>
                            <!-- <th></th> -->
                        </tr>
                    </thead>
                    <tbody>
    <?php if ($count > 0) {
        while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row["id"] ?></td>
                <td><?php echo $row["name"] ?></td>
                <td><?php echo $row["address"] ?></td>
                <td><?php echo $row["tel"] ?></td>
                <td><?php echo $row["email"] ?></td>
                <td><?php echo $row["total"] * 1000 ?></td>
                <td>
                    <select name="status" class="form-control status-select" data-id="<?php echo $row['id']; ?>">
                        <option value="Chưa Duyệt" <?php if ($row['trangthai'] === 'Chưa Duyệt') echo 'selected'; ?>>
                            Chưa Duyệt
                        </option>
                        <option value="Đã Duyệt" <?php if ($row['trangthai'] === 'Đã Duyệt') echo 'selected'; ?>>
                            Đã Duyệt
                        </option>
                        <option value="Đang Giao" <?php if ($row['trangthai'] === 'Đang Giao') echo 'selected'; ?>>
                            Đang Giao
                        </option>
                        <option value="Đã Giao" <?php if ($row['trangthai'] === 'Đã Giao') echo 'selected'; ?>>
                            Đã Giao
                        </option>
                    </select>
                </td>
                <td>
                    <?php 
                    if ($row['trangthai'] === 'Đã Giao') {
                        echo $row['ngaygiao']; // Hiển thị ngày giao khi trạng thái là 'Đã Giao'
                    } else {
                        echo "N/A"; // Nếu trạng thái khác 'Đã Giao', không hiển thị ngày giao
                    }
                    ?>
                </td>
                <td>
                    <a href="xoabill.php?id=<?php echo $row["id"] ?>" style="text-decoration: none">Hủy đơn</a>
                </td>
            </tr>
    <?php
        }
    } ?>
</tbody>
                </table>

            </div>
        </div>

    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Lấy tất cả các select có class status-select
        const statusSelects = document.querySelectorAll('.status-select');

        statusSelects.forEach(select => {
            select.addEventListener('change', function() {
                const id = this.getAttribute('data-id');
                const status = this.value;

                // Tạo object FormData
                const formData = new FormData();
                formData.append('id', id);
                formData.append('trangthai', status);

                // Gửi request đến file xử lý PHP
                fetch('update_trangthai.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.text())
                    .then(data => {
                        if (data === 'success') {
                            alert('Cập nhật trạng thái thành công!');
                        } else {
                            alert('Có lỗi xảy ra khi cập nhật trạng thái!');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Có lỗi xảy ra!');
                    });
            });
        });
    });
</script>

</html>