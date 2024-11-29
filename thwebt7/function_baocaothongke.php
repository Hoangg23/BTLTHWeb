<?php
include 'ketnoi.php';
$ketnoi = new ketnoi();
$conn = $ketnoi->getConn();
function getDoanhThuTheoNgay($ngaygiao) {
    global $conn;
    $sql = "SELECT SUM(total) AS total FROM bill WHERE trangthai = 'Đã giao' AND ngaygiao = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $ngaygiao);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    return $result['total'] ? $result['total'] : 0;
}
function getDoanhThuTheoThang($thanggiao) {
    global $conn;
    $month = substr($thanggiao, 5, 2);
    $year = substr($thanggiao, 0, 4);
    $sql = "SELECT DAY(ngaygiao) AS ngay, SUM(total) AS total 
            FROM bill 
            WHERE trangthai = 'Đã giao' 
            AND MONTH(ngaygiao) = ? 
            AND YEAR(ngaygiao) = ?
            GROUP BY DAY(ngaygiao)
            ORDER BY ngay";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $month, $year);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $totalMonth = 0;
    foreach ($result as $day) {
        $totalMonth += $day['total'];
    }
    return ['days' => $result, 'totalMonth' => $totalMonth];
}
?>
