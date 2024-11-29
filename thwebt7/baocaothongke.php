<?php include "headerquantri.php" ?>
<?php
include 'function_baocaothongke.php';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Báo cáo Doanh thu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script>
        function showDateOrMonth() {
            var option = document.getElementById('doanhthu-option').value;
            if (option === 'day') {
                document.getElementById('ngay-chon').style.display = 'block';
                document.getElementById('thang-chon').style.display = 'none';
            } else if (option === 'month') {
                document.getElementById('ngay-chon').style.display = 'none';
                document.getElementById('thang-chon').style.display = 'block';
            }
        }
        window.onload = function() {
            showDateOrMonth();
        }
    </script>
    <style>
        .container{
            width: 90%;
        }
    </style>
</head>
<body>
    <div class ="container">
    <h1>THỐNG KÊ DOANH THU</h1>

    <form method="GET" action="baocaothongke.php">
        <label for="doanhthu-option">Chọn Doanh thu: </label>
        <select id="doanhthu-option" name="doanhthu" class="form-select" onchange="showDateOrMonth()">
            <option value="day" <?php if(isset($_GET['doanhthu']) && $_GET['doanhthu'] == 'day') echo 'selected'; ?>>Doanh thu theo ngày</option>
            <option value="month" <?php if(isset($_GET['doanhthu']) && $_GET['doanhthu'] == 'month') echo 'selected'; ?>>Doanh thu theo tháng</option>
        </select>
        
        <div id="ngay-chon" class="mt-3" style="display: <?php echo isset($_GET['doanhthu']) && $_GET['doanhthu'] == 'day' ? 'block' : 'none'; ?>">
            <label for="ngay">Chọn Ngày: </label>
            <input type="date" name="ngaygiao" class="form-control" value="<?php echo isset($_GET['ngaygiao']) ? $_GET['ngaygiao'] : ''; ?>">
        </div>

        <div id="thang-chon" class="mt-3" style="display: <?php echo isset($_GET['doanhthu']) && $_GET['doanhthu'] == 'month' ? 'block' : 'none'; ?>">
            <label for="thang">Chọn Tháng: </label>
            <input type="month" name="thanggiao" class="form-control" value="<?php echo isset($_GET['thanggiao']) ? $_GET['thanggiao'] : ''; ?>">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Xem Doanh thu</button>
    </form>

    <div id="doanhthu-ketqua" class="mt-3">
        <?php
        if (isset($_GET['doanhthu'])) {
            if ($_GET['doanhthu'] == 'day' && isset($_GET['ngaygiao'])) {
                $ngaygiao = $_GET['ngaygiao'];
                $total = getDoanhThuTheoNgay($ngaygiao);
                $total *= 1000;  // Nhân với 1000
                echo "Doanh thu ngày " . $ngaygiao . " là: " . number_format($total, 0, ',', '.') . " VND";
            }

            if ($_GET['doanhthu'] == 'month' && isset($_GET['thanggiao'])) {
                $thanggiao = $_GET['thanggiao'];
                $data = getDoanhThuTheoThang($thanggiao);
                $totalMonth = $data['totalMonth'] * 1000;  // Nhân với 1000
                echo "Doanh thu tháng " . $thanggiao . ":<br>";
                foreach ($data['days'] as $dayData) {
                    $dayTotal = $dayData['total'] * 1000;  // Nhân với 1000
                    echo "Ngày " . $dayData['ngay'] . ": " . number_format($dayTotal, 0, ',', '.') . " VND<br>";
                }
                echo "<strong>Tổng doanh thu tháng: " . number_format($totalMonth, 0, ',', '.') . " VND</strong>";
            }
        }
        ?>
    </div>
</div>
</body>
</html>
